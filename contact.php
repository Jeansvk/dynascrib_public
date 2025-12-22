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
                
                <!-- Message de retour (succès ou erreur) -->
                <div id="form-message" style="display: none; padding: 1rem; border-radius: 12px; margin-bottom: 1.5rem;"></div>

                <form id="contact-form" action="send-contact.php" method="POST" style="display: flex; flex-direction: column; gap: 1.5rem;">
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
                            <option value="partnership">Partenariat</option>
                            <option value="other">Autre</option>
                        </select>
                    </div>

                    <div>
                        <label for="message" style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #1e1b4b;">Message</label>
                        <textarea id="message" name="message" rows="6" required
                                  style="width: 100%; padding: 0.875rem; border: 1px solid rgba(226, 232, 240, 0.8); border-radius: 12px; font-family: 'Nunito', sans-serif; font-size: 1rem; resize: vertical;"></textarea>
                    </div>

                    <!-- Honeypot anti-spam (champ caché) -->
                    <input type="text" name="website" style="display: none;" tabindex="-1" autocomplete="off">

                    <button type="submit" class="cta-button" id="submit-btn">
                        <span id="btn-text">Envoyer le message</span>
                        <span id="btn-loading" style="display: none;">Envoi en cours...</span>
                    </button>
                </form>

                <script>
                // Gestion du formulaire de contact avec AJAX
                document.getElementById('contact-form').addEventListener('submit', function(e) {
                    e.preventDefault();

                    const form = this;
                    const formData = new FormData(form);
                    const messageDiv = document.getElementById('form-message');
                    const submitBtn = document.getElementById('submit-btn');
                    const btnText = document.getElementById('btn-text');
                    const btnLoading = document.getElementById('btn-loading');

                    // Désactiver le bouton pendant l'envoi
                    submitBtn.disabled = true;
                    btnText.style.display = 'none';
                    btnLoading.style.display = 'inline';

                    // Cacher le message précédent
                    messageDiv.style.display = 'none';

                    // Envoyer le formulaire via AJAX
                    fetch('send-contact.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Réactiver le bouton
                        submitBtn.disabled = false;
                        btnText.style.display = 'inline';
                        btnLoading.style.display = 'none';

                        // Afficher le message de retour
                        messageDiv.style.display = 'block';
                        messageDiv.textContent = data.message;

                        if (data.success) {
                            // Succès : message vert
                            messageDiv.style.background = 'linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(5, 150, 105, 0.1))';
                            messageDiv.style.border = '1px solid #10b981';
                            messageDiv.style.color = '#065f46';

                            // Réinitialiser le formulaire
                            form.reset();

                            // Faire défiler jusqu'au message
                            messageDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        } else {
                            // Erreur : message rouge
                            messageDiv.style.background = 'linear-gradient(135deg, rgba(239, 68, 68, 0.1), rgba(220, 38, 38, 0.1))';
                            messageDiv.style.border = '1px solid #ef4444';
                            messageDiv.style.color = '#991b1b';
                        }
                    })
                    .catch(error => {
                        // Erreur réseau
                        submitBtn.disabled = false;
                        btnText.style.display = 'inline';
                        btnLoading.style.display = 'none';

                        messageDiv.style.display = 'block';
                        messageDiv.style.background = 'linear-gradient(135deg, rgba(239, 68, 68, 0.1), rgba(220, 38, 38, 0.1))';
                        messageDiv.style.border = '1px solid #ef4444';
                        messageDiv.style.color = '#991b1b';
                        messageDiv.textContent = 'Une erreur est survenue. Veuillez vérifier votre connexion et réessayer.';
                    });
                });
                </script>
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
