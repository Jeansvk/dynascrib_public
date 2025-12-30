<?php
/**
 * Fonctions utilitaires pour l'envoi d'emails
 * DynaScrib - Formulaire de Contact
 */

/**
 * Charge un template HTML et remplace les variables
 *
 * @param string $templateName Nom du fichier template (sans .html)
 * @param array $variables Tableau associatif des variables à remplacer
 * @return string Le contenu HTML avec les variables remplacées
 */
function renderEmailTemplate($templateName, $variables) {
    $templatePath = __DIR__ . '/../templates/' . $templateName . '.html';

    if (!file_exists($templatePath)) {
        error_log("Template email introuvable : $templatePath");
        return '';
    }

    $template = file_get_contents($templatePath);

    // Remplacer toutes les variables {{variable}} par leur valeur
    foreach ($variables as $key => $value) {
        $template = str_replace('{{' . $key . '}}', $value, $template);
    }

    return $template;
}

/**
 * Envoie un email via l'API Resend
 *
 * @param string $to Email du destinataire
 * @param string $subject Sujet de l'email
 * @param string $htmlBody Corps de l'email en HTML
 * @param string $textBody Corps de l'email en texte brut (fallback)
 * @param string|null $replyTo Email de réponse (optionnel)
 * @return array ['success' => bool, 'response' => array|null, 'error' => string|null]
 */
function sendEmail($to, $subject, $htmlBody, $textBody, $replyTo = null) {
    $data = [
        'from' => SITE_NAME . ' <' . EMAIL_REPLY_TO . '>',
        'to' => [$to],
        'subject' => $subject,
        'html' => $htmlBody,
        'text' => $textBody,
    ];

    // Ajouter reply_to si spécifié
    if ($replyTo !== null) {
        $data['reply_to'] = $replyTo;
    }

    // Configuration cURL
    $ch = curl_init('https://api.resend.com/emails');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . RESEND_API_KEY,
        'Content-Type: application/json'
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    // Exécution de la requête
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    curl_close($ch);

    // Vérification du résultat
    if ($httpCode === 200) {
        $responseData = json_decode($response, true);

        // Log du succès (en développement)
        if (ENVIRONMENT === 'development') {
            error_log("Email envoyé avec succès à $to - ID: " . ($responseData['id'] ?? 'N/A'));
        }

        return [
            'success' => true,
            'response' => $responseData,
            'error' => null
        ];
    } else {
        // Log de l'erreur
        error_log("Erreur Resend - Destinataire: $to - Code HTTP: $httpCode - Réponse: $response - Erreur cURL: $curlError");

        return [
            'success' => false,
            'response' => null,
            'error' => "HTTP $httpCode: $response"
        ];
    }
}

/**
 * Génère la version texte d'un email de notification
 *
 * @param string $name Nom de l'expéditeur
 * @param string $email Email de l'expéditeur
 * @param string $subjectLabel Libellé du sujet
 * @param string $message Message
 * @param string $date Date formatée
 * @return string Contenu texte de l'email
 */
function generateNotificationTextBody($name, $email, $subjectLabel, $message, $date) {
    return "
NOUVEAU MESSAGE DE CONTACT - DYNASCRIB
=====================================

Nom: $name
Email: $email
Sujet: $subjectLabel

Message:
--------
$message

Reçu le $date
";
}

/**
 * Génère la version texte d'un email de confirmation
 *
 * @param string $name Nom du destinataire
 * @param string $subjectLabel Libellé du sujet
 * @param string $date Date formatée
 * @param string $siteUrl URL du site
 * @param string $contactEmail Email de contact
 * @return string Contenu texte de l'email
 */
function generateConfirmationTextBody($name, $subjectLabel, $date, $siteUrl, $contactEmail) {
    return "
CONFIRMATION DE RÉCEPTION - DYNASCRIB
=====================================

Bonjour $name,

Nous avons bien reçu votre message et nous vous en remercions.
Notre équipe va l'examiner et vous répondra dans les plus brefs délais.

RÉCAPITULATIF DE VOTRE DEMANDE
--------------------------------
Sujet: $subjectLabel
Date d'envoi: $date

Délai de réponse habituel : 24 à 48 heures (jours ouvrés)

En attendant notre réponse :
- Découvrez nos tarifs : $siteUrl/tarifs
- Consultez notre FAQ : $siteUrl/faq
- Essayez gratuitement : https://app.dynascrib.com/login

---
DynaScrib - Assistant de lecture intelligent
$siteUrl | $contactEmail
Hébergé en Europe | Conforme RGPD
";
}
