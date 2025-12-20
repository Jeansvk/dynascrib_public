<?php
// Configuration SEO de la page
$pageTitle = "Titre de la page - DynaScrib";
$pageDescription = "Description de la page pour le SEO (150-160 caractères idéalement)";
$pageKeywords = "mot-clé 1, mot-clé 2, mot-clé 3";
$pageUrl = "https://dynascrib.com/nom-page.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<?php include 'includes/meta-tags.php'; ?>
</head>
<body>
    <!-- Animated Background Decorations -->
    <div class="bg-decoration bg-decoration-1"></div>
    <div class="bg-decoration bg-decoration-2"></div>
    <div class="bg-decoration bg-decoration-3"></div>

    <?php include 'includes/header.php'; ?>

    <!-- Main Content -->
    <main>
        <div class="hero-section">
            <span class="badge">Badge optionnel</span>
            <h1>Titre Principal de la Page</h1>
            <p class="subtitle">Sous-titre ou description courte de la page.</p>
        </div>

        <!-- Votre contenu ici -->
        <div class="content-container" style="max-width: 1200px; margin: 0 auto; padding: 2rem;">
            <h2>Section 1</h2>
            <p>Contenu de votre page...</p>

            <h2>Section 2</h2>
            <p>Plus de contenu...</p>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
