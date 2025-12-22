<?php
/**
 * Traitement du Formulaire de Contact - DynaScrib
 * Utilise Resend pour l'envoi d'emails
 */

// Charger la configuration et les fonctions
require_once 'config.php';
require_once 'includes/email-functions.php';

// Headers JSON pour les réponses
header('Content-Type: application/json; charset=utf-8');

// Fonction pour envoyer une réponse JSON
function sendResponse($success, $message, $data = []) {
    echo json_encode([
        'success' => $success,
        'message' => $message,
        'data' => $data
    ]);
    exit;
}

// Vérifier que c'est bien une requête POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    sendResponse(false, 'Méthode non autorisée. Utilisez POST.');
}

// Protection CSRF basique (à améliorer avec un token)
$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
if (ENVIRONMENT === 'production' && strpos($referer, SITE_URL) !== 0) {
    sendResponse(false, 'Requête non autorisée.');
}

// Récupération et nettoyage des données
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$subject = isset($_POST['subject']) ? trim($_POST['subject']) : '';
$message = isset($_POST['message']) ? trim($_POST['message']) : '';

// Validation des champs
$errors = [];

if (empty($name) || strlen($name) < 2) {
    $errors[] = 'Le nom doit contenir au moins 2 caractères.';
}

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'L\'adresse email n\'est pas valide.';
}

if (empty($subject)) {
    $errors[] = 'Veuillez sélectionner un sujet.';
}

if (empty($message) || strlen($message) < 10) {
    $errors[] = 'Le message doit contenir au moins 10 caractères.';
}

// Protection anti-spam basique
if (strlen($message) > 5000) {
    $errors[] = 'Le message est trop long (5000 caractères maximum).';
}

// Honeypot (champ caché anti-spam)
$honeypot = isset($_POST['website']) ? $_POST['website'] : '';
if (!empty($honeypot)) {
    // C'est probablement un spam (un bot a rempli le champ caché)
    sendResponse(false, 'Erreur lors de l\'envoi. Veuillez réessayer.');
}

// Si des erreurs, les retourner
if (!empty($errors)) {
    sendResponse(false, implode(' ', $errors));
}

// Nettoyer les données contre XSS
$name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
$subject = htmlspecialchars($subject, ENT_QUOTES, 'UTF-8');
$message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

// Traduire le sujet
$subjectLabels = [
    'info' => 'Demande d\'information',
    'demo' => 'Demande de démonstration',
    'support' => 'Demande de support',
    'partnership' => 'Proposition de partenariat',
    'other' => 'Autre demande'
];
$subjectLabel = isset($subjectLabels[$subject]) ? $subjectLabels[$subject] : 'Contact';

// Date formatée
$currentDate = date('d/m/Y à H:i');

// ============================================================================
// EMAIL 1 : Notification à l'équipe DynaScrib
// ============================================================================

// Variables pour le template de notification
$notificationVars = [
    'name' => $name,
    'email' => $email,
    'subjectLabel' => $subjectLabel,
    'message' => $message,
    'date' => $currentDate
];

// Générer le HTML depuis le template
$notificationHtml = renderEmailTemplate('email-notification', $notificationVars);

// Générer la version texte
$notificationText = generateNotificationTextBody($name, $email, $subjectLabel, $message, $currentDate);

// Envoyer l'email à l'équipe
$notificationSubject = "[$subjectLabel] Message de $name";
$resultTeam = sendEmail(
    EMAIL_TO,
    $notificationSubject,
    $notificationHtml,
    $notificationText,
    $email // Reply-to : email de l'expéditeur
);

// Vérifier l'envoi de l'email équipe
if (!$resultTeam['success']) {
    sendResponse(false, 'Une erreur est survenue lors de l\'envoi du message. Veuillez réessayer ou nous contacter directement à ' . EMAIL_TO . '.');
}

// ============================================================================
// EMAIL 2 : Confirmation à l'expéditeur
// ============================================================================

// Variables pour le template de confirmation
$confirmationVars = [
    'name' => $name,
    'subjectLabel' => $subjectLabel,
    'date' => $currentDate,
    'siteUrl' => SITE_URL,
    'contactEmail' => EMAIL_TO
];

// Générer le HTML depuis le template
$confirmationHtml = renderEmailTemplate('email-confirmation', $confirmationVars);

// Générer la version texte
$confirmationText = generateConfirmationTextBody($name, $subjectLabel, $currentDate, SITE_URL, EMAIL_TO);

// Envoyer l'email de confirmation au client
$confirmationSubject = "Confirmation de réception - DynaScrib";
$resultClient = sendEmail(
    $email,
    $confirmationSubject,
    $confirmationHtml,
    $confirmationText,
    EMAIL_TO // Reply-to : si le client répond, ça va à contact@
);

// ============================================================================
// Réponse finale
// ============================================================================

if ($resultClient['success'] && $resultTeam['success']) {
    // Les deux emails sont partis avec succès
    sendResponse(true, 'Votre message a été envoyé avec succès ! Un email de confirmation vous a été envoyé.', [
        'email_team_id' => $resultTeam['response']['id'] ?? null,
        'email_client_id' => $resultClient['response']['id'] ?? null
    ]);
} else if ($resultTeam['success'] && !$resultClient['success']) {
    // Email équipe OK, mais confirmation client en échec
    sendResponse(true, 'Votre message a été envoyé avec succès ! (Note : l\'email de confirmation n\'a pas pu être envoyé)');
} else {
    // Erreur inattendue (ne devrait pas arriver car déjà vérifié avant)
    sendResponse(false, 'Une erreur est survenue lors de l\'envoi du message. Veuillez réessayer ou nous contacter directement à ' . EMAIL_TO . '.');
}
