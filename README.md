# DynaScrib - Site Web PHP

Structure optimisée pour le SEO et facile à maintenir.

## 📁 Structure du projet

```
dynascrib-php/
├── index.php                    # Page d'accueil (Tarifs)
├── _TEMPLATE_page.php          # Template pour créer de nouvelles pages
├── .htaccess                    # Configuration Apache (URLs propres, cache, sécurité)
│
├── includes/
│   ├── header.php              # En-tête du site (navigation)
│   ├── footer.php              # Pied de page
│   └── meta-tags.php           # Balises SEO dynamiques
│
├── assets/
│   ├── css/
│   │   └── style.css           # Tous les styles du site
│   └── images/
│       ├── favicon.svg         # À ajouter
│       ├── favicon.ico         # À ajouter
│       ├── logo.svg            # À ajouter
│       └── og-image.jpg        # Image pour réseaux sociaux (1200x630px)
│
└── Pages à créer :
    ├── tarifs.php              # Déjà créé (index.php)
    ├── fonctionnalites.php
    ├── ecoles.php
    ├── faq.php
    ├── contact.php
    ├── guide.php
    ├── blog.php
    ├── demo.php
    ├── partenaires.php
    ├── mentions-legales.php
    ├── cgv.php
    ├── confidentialite.php
    └── cookies.php
```

## 🚀 Déploiement sur Infomaniak (ou autre hébergeur)

### 1. Préparation locale
- Vérifiez que tous les fichiers sont présents
- Ajoutez vos images dans `/assets/images/`
- Testez en local avec XAMPP, MAMP ou PHP built-in server

### 2. Upload via FTP
- Utilisez FileZilla ou le gestionnaire de fichiers de votre hébergeur
- Uploadez tous les fichiers à la racine de votre domaine
- Permissions : 644 pour les fichiers, 755 pour les dossiers

### 3. Configuration
- Éditez `.htaccess` selon vos besoins (www ou non-www)
- Vérifiez que les chemins dans `meta-tags.php` pointent vers votre domaine
- Testez toutes les pages

## 📝 Créer une nouvelle page

### Méthode rapide :
1. Copiez `_TEMPLATE_page.php`
2. Renommez (ex: `fonctionnalites.php`)
3. Modifiez les variables SEO en haut :
   ```php
   $pageTitle = "Fonctionnalités - DynaScrib";
   $pageDescription = "Découvrez toutes les fonctionnalités...";
   $pageKeywords = "mots-clés, pertinents";
   $pageUrl = "https://dynascrib.com/fonctionnalites";
   ```
4. Ajoutez votre contenu dans la section `<main>`
5. Uploadez via FTP

### Exemple de contenu :
```php
<main>
    <div class="hero-section">
        <h1>Nos Fonctionnalités</h1>
        <p class="subtitle">Découvrez tout ce que DynaScrib peut faire pour vous.</p>
    </div>

    <div class="content-container">
        <section>
            <h2>Lecture Intelligente</h2>
            <p>Votre contenu ici...</p>
        </section>
    </div>
</main>
```

## 🎨 Modifier le design

Tous les styles sont dans `/assets/css/style.css`

Variables CSS disponibles :
- `--primary-purple` : #a855f7
- `--primary-pink` : #ec4899
- `--primary-orange` : #f97316
- `--text-primary` : #1e1b4b
- `--text-secondary` : #64748b

## 🔧 Modifier Header/Footer

**Pour modifier la navigation** :
Éditez `/includes/header.php`

**Pour modifier le footer** :
Éditez `/includes/footer.php`

**Important** : Une modification = changement sur toutes les pages !

## 📊 SEO - Points importants

### Chaque page doit avoir :
✅ Title unique (50-60 caractères)
✅ Description unique (150-160 caractères)
✅ Mots-clés pertinents
✅ URL propre (grâce au .htaccess)
✅ Balises H1, H2, H3 structurées
✅ Images avec attributs alt

### URLs propres activées :
- `/tarifs` au lieu de `/tarifs.php`
- `/contact` au lieu de `/contact.php`

### Fichiers à créer pour SEO optimal :
1. **sitemap.xml** : Liste de toutes vos pages
2. **robots.txt** : Instructions pour les moteurs de recherche
3. **og-image.jpg** : Image 1200x630px pour partages sociaux

## 🔒 Sécurité

Le fichier `.htaccess` inclut :
- Redirection HTTPS automatique
- Protection contre listing des dossiers
- En-têtes de sécurité (XSS, Clickjacking, etc.)
- Cache navigateur optimisé

## 📱 Responsive

Le design est déjà responsive (mobile, tablette, desktop).
Testez sur différents appareils avant de publier.

## 🆘 Besoin d'aide ?

### Problèmes courants :

**Les styles ne s'affichent pas** :
- Vérifiez le chemin dans le navigateur : `/assets/css/style.css`
- Videz le cache navigateur (Ctrl+Shift+R)

**Erreur 404 sur les pages** :
- Vérifiez que `.htaccess` est bien uploadé
- Vérifiez que mod_rewrite est activé chez votre hébergeur

**Les includes ne fonctionnent pas** :
- Vérifiez les chemins (sensible à la casse)
- Vérifiez que PHP est activé

## 📈 Améliorations futures

- [ ] Ajouter Google Analytics
- [ ] Créer sitemap.xml
- [ ] Créer robots.txt
- [ ] Optimiser les images (WebP)
- [ ] Ajouter un blog avec système de posts
- [ ] Formulaire de contact fonctionnel
- [ ] Newsletter

## 🌐 Connexion avec l'app React

Les boutons "Connexion" et "Inscription" pointent vers :
- `https://app.dynascrib.com/connexion`
- `https://app.dynascrib.com/inscription`

Modifiez ces URLs dans `/includes/header.php` si nécessaire.

---

**Bon développement ! 🚀**
