<?php
/**
 * Configuration DynaScrib - EXEMPLE
 *
 * INSTRUCTIONS :
 * 1. Copiez ce fichier et renommez-le en "config.php"
 * 2. Remplissez vos vraies valeurs ci-dessous
 * 3. NE JAMAIS commiter config.php dans Git (il est dans .gitignore)
 */

// Configuration Resend
define('RESEND_API_KEY', 're_votre_cle_api_resend'); // Obtenez votre clé sur https://resend.com/api-keys

// Configuration Email
define('EMAIL_FROM', 'contact@dynascrib.com'); // Email expéditeur (doit être vérifié dans Resend)
define('EMAIL_TO', 'contact@dynascrib.com'); // Email destinataire pour recevoir les messages
define('EMAIL_REPLY_TO', 'noreply@dynascrib.com'); // Email de réponse

// Configuration Site
define('SITE_URL', 'https://dynascrib.com'); // URL de votre site (sans / à la fin)
define('SITE_NAME', 'DynaScrib');

// Environnement (development ou production)
define('ENVIRONMENT', 'development'); // Changez en 'production' une fois en ligne

// Configuration PHP
if (ENVIRONMENT === 'development') {
    // En développement : afficher les erreurs
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    // En production : masquer les erreurs
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(0);
}

// Timezone
date_default_timezone_set('Europe/Zurich');
