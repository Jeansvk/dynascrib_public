<?php
// Configuration SEO de la page
$pageTitle = "Contact - DynaScrib | Contactez-nous";
$pageDescription = "Une question sur DynaScrib ? Contactez notre équipe pour toute demande d'information, support technique ou partenariat.";
$pageKeywords = "contact dynascrib, support, aide, assistance, question";
$pageUrl = "https://dynascrib.com/contact";
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
            <span class="badge">Nous sommes là pour vous</span>
            <h1>Contactez-nous</h1>
            <p class="subtitle">Une question ? Un projet ? Notre équipe est à votre écoute.</p>
        </div>

        <div class="content-container" style="max-width: 800px; margin: 0 auto; padding: 3rem 2rem;">
            
            <!-- Section Contact -->
            <div style="background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(20px); padding: 3rem; border-radius: 24px; box-shadow: 0 10px 25px -3px rgba(0, 0, 0, 0.08); margin-bottom: 2rem;">
                <h2 style="font-family: 'Quicksand', sans-serif; font-size: 2rem; margin-bottom: 1.5rem; color: #1e1b4b;">Envoyez-nous un message</h2>
                
                <form action="#" method="POST" style="display: flex; flex-direction: column; gap: 1.5rem;">
                    <div>
                        <label for="name" style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #1e1b4b;">Nom complet</label>
                        <input type="text" id="name" name="name" required 
                               style="width: 100%; padding: 0.875rem; border: 1px solid rgba(226, 232, 240, 0.8); border-radius: 12px; font-family: 'Nunito', sans-serif; font-size: 1rem;">
                    </div>
                    
                    <div>
                        <label for="email" style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #1e1b4b;">Email</label>
                        <input type="email" id="email" name="email" required 
                               style="width: 100%; padding: 0.875rem; border: 1px solid rgba(226, 232, 240, 0.8); border-radius: 12px; font-family: 'Nunito', sans-serif; font-size: 1rem;">
                    </div>
                    
                    <div>
                        <label for="subject" style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #1e1b4b;">Sujet</label>
                        <select id="subject" name="subject" required 
                                style="width: 100%; padding: 0.875rem; border: 1px solid rgba(226, 232, 240, 0.8); border-radius: 12px; font-family: 'Nunito', sans-serif; font-size: 1rem;">
                            <option value="">Sélectionnez un sujet</option>
                            <option value="info">Demande d'information</option>
                            <option value="demo">Demande de démo</option>
                            <option value="support">Support technique</option>
                            <option value="partenariat">Partenariat</option>
                            <option value="autre">Autre</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="message" style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #1e1b4b;">Message</label>
                        <textarea id="message" name="message" rows="6" required 
                                  style="width: 100%; padding: 0.875rem; border: 1px solid rgba(226, 232, 240, 0.8); border-radius: 12px; font-family: 'Nunito', sans-serif; font-size: 1rem; resize: vertical;"></textarea>
                    </div>
                    
                    <button type="submit" class="cta-button">Envoyer le message</button>
                </form>
            </div>

            <!-- Autres moyens de contact -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-top: 3rem;">
                <div style="background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(20px); padding: 2rem; border-radius: 20px; text-align: center;">
                    <div style="font-size: 2.5rem; margin-bottom: 1rem;">📧</div>
                    <h3 style="font-family: 'Quicksand', sans-serif; margin-bottom: 0.5rem;">Email</h3>
                    <a href="mailto:contact@dynascrib.com" style="color: #a855f7; text-decoration: none; font-weight: 600;">contact@dynascrib.com</a>
                </div>
                
                <div style="background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(20px); padding: 2rem; border-radius: 20px; text-align: center;">
                    <div style="font-size: 2.5rem; margin-bottom: 1rem;">💬</div>
                    <h3 style="font-family: 'Quicksand', sans-serif; margin-bottom: 0.5rem;">Support</h3>
                    <a href="/faq" style="color: #a855f7; text-decoration: none; font-weight: 600;">Consulter la FAQ</a>
                </div>
            </div>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
