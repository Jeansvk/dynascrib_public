# 📋 GUIDE DE PERSONNALISATION - PAGES LÉGALES

## ✅ Pages créées

4 pages légales prêtes à être personnalisées :

1. **mentions-legales.php** - Informations juridiques de l'entreprise
2. **cgv.php** - Conditions Générales de Vente et d'Utilisation
3. **confidentialite.php** - Politique de confidentialité (RGPD)
4. **cookies.php** - Politique d'utilisation des cookies

---

## 🔧 COMMENT LES PERSONNALISER

### Étape 1 : Remplacer les placeholders

Cherchez et remplacez dans **CHAQUE fichier** les éléments entre crochets `[...]` :

#### Dans `mentions-legales.php` :
```
[NOM DE VOTRE SOCIÉTÉ] → Dynamicom Sàrl (par exemple)
[Sàrl / SA / Autre] → Sàrl
CHE-XXX.XXX.XXX → CHE-123.456.789 (votre numéro IDE)
[MONTANT] → 20'000 (montant du capital)
[Adresse complète, NPA Ville, Suisse] → Rue de l'Innovation 12, 1400 Yverdon-les-Bains, Suisse
[+41 XX XXX XX XX] → +41 24 XXX XX XX
[NOM DU DIRECTEUR] → Prénom Nom
[VOTRE CANTON] → Vaud
[Date] → 20 décembre 2024
```

#### Dans `cgv.php` :
```
[VOTRE CANTON] → Vaud
[Date] → 20 décembre 2024
```

#### Dans `confidentialite.php` :
```
[NOM DE VOTRE SOCIÉTÉ] → Dynamicom Sàrl
[Adresse complète] → Rue de l'Innovation 12, 1400 Yverdon-les-Bains, Suisse
[Nom ou email DPO] → dpo@dynascrib.com ou "Non désigné (PME)"
[Stripe/PayPal/Autre] → Stripe (ou votre processeur)
[Service utilisé] → SendGrid, Mailchimp, ou autre
[Si applicable] → Google Analytics (si vous l'utilisez)
[Date] → 20 décembre 2024
```

#### Dans `cookies.php` :
```
[Date] → 20 décembre 2024
[Si Google Analytics] → Supprimer cette mention si vous n'utilisez pas GA
```

---

## ⚠️ POINTS D'ATTENTION IMPORTANTS

### 1. Processeur de paiement
Vous DEVEZ mettre à jour selon votre choix réel :
- Stripe
- PayPal  
- PostFinance
- Autre

### 2. Service d'emailing
Si vous envoyez des emails (newsletters, notifications), précisez le service :
- SendGrid
- Mailchimp
- Brevo (ex-Sendinblue)
- MailerLite
- Service interne

### 3. Analytics
**Si vous utilisez Google Analytics :**
- Gardez la section dans cookies.php
- Mentionnez-le dans confidentialite.php
- **IMPORTANT :** Activez l'anonymisation IP

**Si vous N'utilisez PAS Google Analytics :**
- Supprimez toute la section "2.2 Cookies analytiques"
- Supprimez les mentions dans confidentialite.php

### 4. Hébergement
J'ai mis **Infomaniak** par défaut car c'est en Suisse.
Si vous utilisez autre chose, modifiez dans :
- mentions-legales.php (section Hébergement)
- confidentialite.php (section 5. Partage des données)

---

## 📝 SECTIONS À ADAPTER SELON VOTRE RÉALITÉ

### Dans confidentialite.php - Section 2.3 "Données d'utilisation"

**Actuellement j'ai mis :**
```
- Documents téléchargés (PDFs, textes)
- Annotations et notes personnelles
- Préférences d'utilisation
- Statistiques d'utilisation du service
```

**Adaptez selon ce que vous collectez vraiment !**

### Dans cookies.php - Section 2 "Cookies utilisés"

**Vous devez lister UNIQUEMENT les cookies que vous utilisez réellement.**

Pour le savoir :
1. Ouvrez votre site
2. Inspecteur navigateur (F12)
3. Onglet "Application" > "Cookies"
4. Listez ce qui apparaît

Exemples courants :
- Cookie de session : PHPSESSID ou dynascrib_session
- Cookie de consentement : cookie_consent
- Google Analytics : _ga, _gid (si vous l'utilisez)

---

## 🚨 VALIDATION JURIDIQUE

### Ce qui est DANS les fichiers :
✅ Structure professionnelle conforme RGPD
✅ Sections obligatoires présentes
✅ Terminologie correcte
✅ Droits des utilisateurs bien expliqués

### Ce qui MANQUE (et que vous devez faire) :
❌ Informations spécifiques à VOTRE entreprise
❌ Validation par un avocat spécialisé
❌ Adaptation à votre infrastructure technique réelle

### Recommandation :
1. **Phase 1 (Maintenant)** : Remplissez les placeholders avec vos vraies infos
2. **Phase 2 (Avant lancement public)** : Faites valider par un avocat
3. **Coût avocat** : 500-800 CHF pour une validation complète

---

## 📧 EMAILS À CRÉER

Créez ces adresses email professionnelles :

```
contact@dynascrib.com → Support général
privacy@dynascrib.com → Questions RGPD/confidentialité  
dpo@dynascrib.com → Délégué protection des données (optionnel pour PME)
legal@dynascrib.com → Questions juridiques (optionnel)
```

Vous pouvez rediriger plusieurs emails vers la même boîte si vous êtes une petite équipe.

---

## 🔗 LIENS ENTRE LES PAGES

Les pages se référencent entre elles, c'est normal :
- Mentions légales → Renvoie vers Confidentialité et Cookies
- CGV → Renvoie vers Confidentialité
- Confidentialité → Renvoie vers Cookies
- Footer → Liens vers toutes ces pages

Vérifiez que tous les liens fonctionnent après upload !

---

## 📅 DATES DE MISE À JOUR

**Remplacez `[Date]` par la vraie date de publication.**

**Ensuite, mettez à jour la date quand vous modifiez :**
- Changement de tarifs → CGV
- Nouveau cookie → Cookies
- Nouveau service tiers → Confidentialité
- Changement d'adresse → Mentions légales

---

## ✅ CHECKLIST AVANT PUBLICATION

Avant de mettre en ligne, vérifiez :

### Mentions légales :
- [ ] Nom de société correct
- [ ] Numéro IDE correct
- [ ] Adresse exacte
- [ ] Email et téléphone fonctionnels
- [ ] Nom du responsable

### CGV :
- [ ] Tarifs exacts (9.90 CHF mensuel, 90 CHF annuel)
- [ ] Période d'essai confirmée (30 jours)
- [ ] Canton pour juridiction compétente
- [ ] Email de contact fonctionnel

### Confidentialité :
- [ ] Processeur de paiement correct (Stripe, PayPal, etc.)
- [ ] Service d'emailing correct
- [ ] Analytics mentionné SI utilisé
- [ ] Email privacy@dynascrib.com créé

### Cookies :
- [ ] Liste UNIQUEMENT les cookies réellement utilisés
- [ ] Google Analytics SI et SEULEMENT SI vous l'utilisez
- [ ] Lien "Gérer les cookies" dans le footer fonctionne

---

## 🎯 PROCHAINES ÉTAPES

1. **Personnalisez** tous les placeholders (30 min)
2. **Uploadez** les 4 fichiers sur votre serveur
3. **Testez** que toutes les pages s'affichent bien
4. **Vérifiez** les liens dans le footer
5. **Planifiez** une validation avocat avant lancement public

---

## 💡 BESOIN D'AIDE ?

Si vous avez des questions sur quoi mettre où, contactez-moi !

Les parties entre `[...]` sont des placeholders à remplacer.
Les parties sans crochets sont du contenu générique standard qui devrait convenir mais peut être affiné.

**Bon courage ! 🚀**
