<!-- Footer -->
<footer>
    <div class="footer-content">
        <div class="footer-top">
            <div class="footer-brand">
                <div class="footer-logo-container">
                    <svg class="footer-logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32">
                        <defs>
                            <linearGradient id="footerGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#a855f7"/>
                                <stop offset="50%" style="stop-color:#ec4899"/>
                                <stop offset="100%" style="stop-color:#f97316"/>
                            </linearGradient>
                        </defs>
                        <rect width="32" height="32" rx="8" fill="url(#footerGradient)"/>
                        <path d="M10 8h8l4 4v12a2 2 0 0 1-2 2H10a2 2 0 0 1-2-2V10a2 2 0 0 1 2-2z" fill="none" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <polyline points="18 8 18 12 22 12" fill="none" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <line x1="11" y1="17" x2="21" y2="17" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                        <line x1="11" y1="21" x2="17" y2="21" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                    <span class="footer-brand-name">DynaScrib</span>
                </div>
                <p class="footer-description">Facilitez la lecture pour tous grâce à l'intelligence artificielle. Une solution innovante pour l'éducation et l'accessibilité.</p>
                <div style="display: flex; flex-direction: column; gap: 0.75rem; margin-top: 0.5rem;">
                    <span class="footer-badge">🇪🇺 Hébergé en Europe</span>
                    <span class="footer-badge" style="background: rgba(34, 197, 94, 0.15); color: #86efac; border-color: rgba(34, 197, 94, 0.2);">✓ Conforme RGPD</span>
                </div>
            </div>

            <div class="footer-column">
                <h3>Produit</h3>
                <ul class="footer-links">
                    <li><a href="/tarifs.php">Tarifs</a></li>
                    <li><span style="color: #64748b; cursor: not-allowed; opacity: 0.5;">Fonctionnalités (bientôt)</span></li>
                    <li><span style="color: #64748b; cursor: not-allowed; opacity: 0.5;">Pour les écoles (bientôt)</span></li>
                    <li><a href="/contact.php">Demander une démo</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h3>Ressources</h3>
                <ul class="footer-links">
                    <li><span style="color: #64748b; cursor: not-allowed; opacity: 0.5;">Guide d'utilisation (bientôt)</span></li>
                    <li><span style="color: #64748b; cursor: not-allowed; opacity: 0.5;">FAQ (bientôt)</span></li>
                    <li><span style="color: #64748b; cursor: not-allowed; opacity: 0.5;">Blog (bientôt)</span></li>
                    <li><span style="color: #64748b; cursor: not-allowed; opacity: 0.5;">Espace Partenaires (bientôt)</span></li>
                    <li><a href="/contact.php">Nous contacter</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h3>Légal</h3>
                <ul class="footer-links">
                    <li><a href="/mentions-legales.php">Mentions Légales</a></li>
                    <li><a href="/cgv.php">CGV / CGU</a></li>
                    <li><a href="/confidentialite.php">Confidentialité</a></li>
                    <li><a href="/cookies.php">Cookies</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p class="copyright">© <?php echo date('Y'); ?> DynaScrib. Tous droits réservés.</p>
            <div class="powered-by">
                <p style="margin-bottom: 0.5rem;">Une solution propulsée par</p>
                <a href="https://dynamicom.ch" target="_blank" rel="noopener noreferrer">
                    <svg viewBox="0 0 480 140" xmlns="http://www.w3.org/2000/svg" style="width: 180px; height: auto;">
                        <defs>
                            <filter id="whiteGlow" x="-50%" y="-50%" width="200%" height="200%">
                                <feGaussianBlur in="SourceAlpha" stdDeviation="2"/>
                                <feOffset dx="0" dy="0" result="offsetblur"/>
                                <feFlood flood-color="#FFFFFF" flood-opacity="0.2"/>
                                <feComposite in2="offsetblur" operator="in"/>
                                <feMerge>
                                    <feMergeNode/>
                                    <feMergeNode in="SourceGraphic"/>
                                </feMerge>
                            </filter>
                        </defs>
                        <g transform="translate(30, 30)" filter="url(#whiteGlow)">
                            <path fill="white" fill-rule="evenodd" d="M 20 5 C 8 5, 0 13, 0 25 L 0 65 C 0 77, 8 85, 20 85 L 25 85 L 18 98 C 18 99, 19 99, 20 98 L 38 85 L 65 85 C 82 85, 95 72, 95 55 L 95 35 C 95 18, 82 5, 65 5 Z M 30 28 C 30 22, 35 18, 42 18 L 55 18 C 68 18, 75 25, 75 38 L 75 52 C 75 65, 68 72, 55 72 L 42 72 C 35 72, 30 68, 30 62 Z "/>
                            <circle cx="45" cy="45" r="5" fill="#E2E8F0"/>
                            <circle cx="38" cy="35" r="3" fill="#CBD5E1" opacity="0.8"/>
                            <circle cx="52" cy="35" r="3" fill="#CBD5E1" opacity="0.8"/>
                            <circle cx="45" cy="55" r="3" fill="#CBD5E1" opacity="0.8"/>
                            <line x1="38" y1="35" x2="45" y2="45" stroke="#CBD5E1" stroke-width="0.8"/>
                            <line x1="52" y1="35" x2="45" y2="45" stroke="#CBD5E1" stroke-width="0.8"/>
                            <line x1="45" y1="55" x2="45" y2="45" stroke="#CBD5E1" stroke-width="0.8"/>
                            <g transform="translate(100, 45)" opacity="0.5">
                                <path d="M 0 0 C 6 -10, 6 -10, 8 0 C 6 10, 6 10, 0 0" stroke="white" stroke-width="1.5" fill="none" stroke-linecap="round"/>
                                <path d="M 10 0 C 18 -15, 18 -15, 20 0 C 18 15, 18 15, 10 0" stroke="white" stroke-width="1.2" fill="none" stroke-linecap="round" opacity="0.8"/>
                                <path d="M 20 0 C 30 -20, 30 -20, 32 0 C 30 20, 30 20, 20 0" stroke="white" stroke-width="1" fill="none" stroke-linecap="round" opacity="0.6"/>
                            </g>
                        </g>
                        <g transform="translate(170, 73)">
                            <text x="0" y="0" font-family="Inter, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif" font-size="46" font-weight="600" fill="white" letter-spacing="-0.5">DYNAMICOM</text>
                            <text x="0" y="26" font-family="Inter, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif" font-size="13" font-weight="400" fill="#94A3B8" letter-spacing="3">TECHNOLOGIES D'AIDE</text>
                        </g>
                    </svg>
                </a>
            </div>
            <a href="https://www.linkedin.com/company/dynamicom" target="_blank" rel="noopener noreferrer" class="linkedin-link">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" fill="#64748b"/>
                </svg>
            </a>
        </div>
    </div>
</footer>
