<?php
// Configuration SEO de la page
$pageTitle = "Tarifs - DynaScrib | L'assistant de lecture intelligent";
$pageDescription = "Découvrez nos offres adaptées à tous les besoins : formule individuelle à 9.90 CHF/mois ou formule équipe pour les établissements scolaires. Essai gratuit 30 jours.";
$pageKeywords = "tarifs dynascrib, prix lecture intelligente, abonnement IA éducation, forfait individuel, forfait école";
$pageUrl = "https://dynascrib.com/tarifs.php";
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
            <span class="badge">Tarifs simples et transparents</span>
            <h1>Choisissez votre formule</h1>
            <p class="subtitle">Des offres adaptées à tous les besoins, de l'utilisateur individuel aux établissements scolaires.</p>
        </div>

        <div class="pricing-container">
            <!-- Individual Plan -->
            <div class="pricing-card recommended">
                <span class="recommended-badge">Recommandé</span>
                <div class="card-icon">📄</div>
                <h2 class="plan-name">Individuel</h2>
                <p class="plan-description">Pour les familles</p>

                <div class="billing-options">
                    <button class="billing-option">Mensuel</button>
                    <button class="billing-option active">Annuel</button>
                </div>

                <div class="price">7.50 CHF<span class="price-period">/mois</span></div>
                <div class="annual-detail" style="display: block;">soit 90 CHF par an</div>
                
                <span class="trial-info">30 jours d'essai offerts</span>

                <ul class="features">
                    <li>Lecture PDF avancée & Vocale HD</li>
                    <li>Documents illimités</li>
                    <li>Annotations illimitées</li>
                    <li>Correction IA & Export Word</li>
                </ul>

                <button class="cta-button" onclick="window.location.href='https://app.dynascrib.com/inscription'">Essayer gratuitement 30 jours</button>
                <p class="terms">Pas de prélèvement immédiat • Annulable à tout moment</p>
            </div>

            <!-- Team Plan -->
            <div class="pricing-card">
                <div class="card-icon">👥</div>
                <h2 class="plan-name">Équipe</h2>
                <p class="plan-description">Pour les établissements scolaires et groupes</p>

                <div class="price" style="margin-top: 5.5rem; margin-bottom: 1.5rem;">Sur devis</div>

                <ul class="features">
                    <li>Tout de l'offre Individuel</li>
                    <li>Gestion centralisée des utilisateurs</li>
                    <li>Tableau de bord administrateur</li>
                    <li>Formation et Support prioritaire</li>
                </ul>

                <button class="cta-button secondary" onclick="window.location.href='/demo.php'">Demander une démo</button>
            </div>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>

    <script>
        // Pricing toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            const individualCard = document.querySelector('.pricing-card.recommended');
            const monthlyBtn = individualCard.querySelector('.billing-option:nth-child(1)');
            const annualBtn = individualCard.querySelector('.billing-option:nth-child(2)');
            const priceDisplay = individualCard.querySelector('.price');
            const billingOptions = individualCard.querySelector('.billing-options');
            
            // Get or create the annual detail element
            let annualDetail = individualCard.querySelector('.annual-detail');
            if (!annualDetail) {
                annualDetail = document.createElement('div');
                annualDetail.className = 'annual-detail';
                annualDetail.style.cssText = 'font-size: 0.875rem; color: #94a3b8; margin-top: 0.5rem; margin-bottom: 1.25rem; font-weight: 500;';
                priceDisplay.parentNode.insertBefore(annualDetail, priceDisplay.nextSibling);
            }

            // Create economy info element below toggle
            let economyInfo = individualCard.querySelector('.economy-info');
            if (!economyInfo) {
                economyInfo = document.createElement('div');
                economyInfo.className = 'economy-info';
                economyInfo.style.cssText = 'text-align: center; font-size: 0.875rem; color: #15803d; font-weight: 600; margin-top: 0.75rem; margin-bottom: 1.25rem; display: block; background: linear-gradient(135deg, #dcfce7, #bbf7d0); padding: 0.625rem 1rem; border-radius: 12px;';
                billingOptions.parentNode.insertBefore(economyInfo, billingOptions.nextSibling);
                economyInfo.innerHTML = '🎉 Économisez 3 mois';
            }
            
            const prices = {
                monthly: {
                    display: '9.90 CHF',
                    detail: ''
                },
                annual: {
                    display: '7.50 CHF',
                    detail: 'soit 90 CHF par an'
                }
            };

            function setActiveButton(activeBtn) {
                // Remove active class from all buttons
                monthlyBtn.classList.remove('active');
                annualBtn.classList.remove('active');
                
                // Add active class to clicked button
                activeBtn.classList.add('active');
            }

            monthlyBtn.addEventListener('click', function() {
                setActiveButton(monthlyBtn);
                priceDisplay.innerHTML = prices.monthly.display + '<span class="price-period">/mois</span>';
                annualDetail.style.display = 'none';
                annualDetail.textContent = '';
                economyInfo.style.display = 'none';
            });

            annualBtn.addEventListener('click', function() {
                setActiveButton(annualBtn);
                priceDisplay.innerHTML = prices.annual.display + '<span class="price-period">/mois</span>';
                annualDetail.style.display = 'block';
                annualDetail.textContent = prices.annual.detail;
                economyInfo.style.display = 'block';
            });
        });
    </script>
</body>
</html>
