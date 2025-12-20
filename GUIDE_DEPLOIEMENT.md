# 🚀 GUIDE DE DÉPLOIEMENT DYNASCRIB

## ✅ CE QUI A ÉTÉ FAIT

Votre site DynaScrib a été converti en **structure PHP modulaire optimisée pour le SEO**.

### 📦 Contenu du package :

**Fichiers PHP principaux :**
- `index.php` - Page d'accueil / Tarifs (prête à l'emploi)
- `contact.php` - Page de contact avec formulaire
- `_TEMPLATE_page.php` - Template pour créer rapidement de nouvelles pages

**Fichiers de configuration :**
- `.htaccess` - URLs propres, cache, sécurité, HTTPS
- `sitemap.xml` - Plan du site pour Google
- `robots.txt` - Instructions pour les moteurs de recherche

**Includes (réutilisables sur toutes les pages) :**
- `includes/header.php` - Navigation (modifier une fois = change partout)
- `includes/footer.php` - Pied de page (modifier une fois = change partout)
- `includes/meta-tags.php` - SEO automatique par page

**Assets :**
- `assets/css/style.css` - Tous vos styles
- `assets/images/` - Dossier pour vos images

**Documentation :**
- `README.md` - Guide complet d'utilisation

---

## 🎯 PROCHAINES ÉTAPES

### 1️⃣ Compléter les images manquantes

Créez et ajoutez dans `/assets/images/` :
- `favicon.svg` - Icône du site (32x32px)
- `favicon.ico` - Version .ico du favicon
- `logo.svg` - Logo DynaScrib
- `og-image.jpg` - Image pour partages réseaux sociaux (1200x630px)

### 2️⃣ Créer les pages manquantes

Utilisez `_TEMPLATE_page.php` pour créer :
- `fonctionnalites.php`
- `ecoles.php`
- `faq.php`
- `guide.php`
- `blog.php`
- `demo.php`
- `partenaires.php`
- `mentions-legales.php`
- `cgv.php`
- `confidentialite.php`
- `cookies.php`

**Méthode rapide :**
1. Copiez `_TEMPLATE_page.php`
2. Renommez (ex: `faq.php`)
3. Modifiez les 4 variables en haut (titre, description, mots-clés, URL)
4. Ajoutez votre contenu
5. C'est prêt !

### 3️⃣ Héberger sur Infomaniak

**Option A : Hébergement Web (Recommandé - ~6 CHF/mois)**
1. Allez sur infomaniak.com
2. Commandez un hébergement web + domaine dynascrib.com
3. Une fois activé, connectez-vous au gestionnaire de fichiers
4. Uploadez TOUT le contenu du dossier `dynascrib-php`
5. C'est en ligne !

**Option B : Via FTP**
1. Téléchargez FileZilla
2. Connectez-vous avec les identifiants FTP d'Infomaniak
3. Uploadez tous les fichiers à la racine
4. Permissions : 644 pour fichiers, 755 pour dossiers

---

## 🔧 CONFIGURATION FINALE

### Modifier les URLs vers l'app React

Dans `/includes/header.php`, changez :
```php
<a href="https://app.dynascrib.com/connexion" class="btn-connexion">Connexion</a>
<a href="https://app.dynascrib.com/inscription" class="btn-inscription">Inscription</a>
```

Par vos vraies URLs quand l'app sera prête.

### Vérifier le .htaccess

Ouvrez `.htaccess` et choisissez :
- Avec www : décommentez les lignes 9-10
- Sans www : décommentez les lignes 13-14 (recommandé)

### Mettre à jour sitemap.xml

Après avoir créé toutes vos pages, mettez à jour la date :
```xml
<lastmod>2025-01-15</lastmod>
```

---

## 📊 OPTIMISATION SEO

### ✅ Déjà fait :
- Meta tags dynamiques par page
- Open Graph pour réseaux sociaux
- Schema.org JSON-LD
- URLs propres (sans .php)
- Sitemap.xml
- Robots.txt
- Cache navigateur
- Compression GZIP
- En-têtes de sécurité

### 🎯 À faire ensuite :
1. **Google Search Console**
   - Ajoutez votre site
   - Soumettez le sitemap.xml
   
2. **Google Analytics**
   - Créez un compte
   - Ajoutez le code de suivi dans `meta-tags.php`

3. **Performance**
   - Optimisez les images (utilisez WebP)
   - Testez sur PageSpeed Insights

---

## 🌐 STRUCTURE FINALE

```
dynascrib.com              → Site vitrine (PHP)
  ├── /                    → Tarifs
  ├── /fonctionnalites     → Fonctionnalités
  ├── /contact             → Contact
  └── ...                  → Autres pages

app.dynascrib.com          → Application (React)
  ├── /connexion           → Login
  ├── /inscription         → Signup
  └── /dashboard           → App
```

---

## 💡 CONSEILS

### Pour chaque nouvelle page :
1. **Title** : 50-60 caractères, unique
2. **Description** : 150-160 caractères, engageante
3. **Mots-clés** : 5-10 mots pertinents
4. **H1** : Un seul par page, descriptif
5. **Images** : Toujours avec attribut `alt`

### URLs propres :
Grâce au .htaccess, vos visiteurs verront :
- `dynascrib.com/tarifs` ✅
- Au lieu de `dynascrib.com/tarifs.php` ❌

### Maintenance :
- Une modification du header/footer = change partout automatiquement
- Un seul fichier CSS à maintenir
- Variables PHP pour éviter les répétitions

---

## 🆘 SUPPORT

**Problèmes fréquents :**

**"Les styles ne s'affichent pas"**
→ Vérifiez que `/assets/css/style.css` est bien uploadé
→ Videz le cache : Ctrl+Shift+R

**"Erreur 404 sur les pages"**
→ Vérifiez que `.htaccess` est uploadé
→ Contactez Infomaniak pour activer mod_rewrite

**"Les includes ne marchent pas"**
→ Vérifiez que PHP est activé
→ Vérifiez les chemins (majuscules/minuscules)

---

## 📈 STATISTIQUES À SUIVRE

Une fois en ligne, surveillez :
- Trafic (Google Analytics)
- Positions Google (Search Console)
- Vitesse de chargement (PageSpeed Insights)
- Taux de conversion (Tarifs → Inscription)

---

## ✨ RÉSULTAT ATTENDU

**Avant :** 1 fichier HTML impossible à maintenir

**Après :**
✅ Structure modulaire facile à maintenir
✅ SEO optimisé pour Google
✅ Ajout de pages en 2 minutes
✅ Header/Footer centralisés
✅ Performance maximale
✅ Sécurité renforcée
✅ URLs propres
✅ Prêt pour le référencement

---

**Vous avez tout ce qu'il faut pour lancer DynaScrib ! 🚀**

En cas de question, relisez le `README.md` dans le dossier.

Bon lancement ! 🎉
