# 📧 Configuration Resend pour le Formulaire de Contact

## Étape 1 : Créer un Compte Resend

1. Allez sur **https://resend.com**
2. Créez un compte gratuit (100 emails/jour gratuit)
3. Confirmez votre email

---

## Étape 2 : Vérifier votre Domaine dans Resend

### A. Ajouter votre domaine

1. Connectez-vous à **https://resend.com/domains**
2. Cliquez sur **"Add Domain"**
3. Entrez : `dynascrib.com`
4. Cliquez sur **"Add"**

### B. Configurer les enregistrements DNS

Resend va vous donner 3 enregistrements DNS à ajouter :

**Sur le panel Infomaniak (Gestion DNS) :**
1. Allez dans **Domaines** → **dynascrib.com** → **Zone DNS**
2. Ajoutez les 3 enregistrements fournis par Resend :

```
Type    Nom                         Valeur
TXT     @                          resend-verification=XXXXX
TXT     resend._domainkey          v=DKIM1; k=rsa; p=XXXXX...
CNAME   em1234._domainkey          em1234.resend.com
```

3. Sauvegardez les modifications
4. Attendez 5-15 minutes pour la propagation
5. Retournez sur Resend et cliquez sur **"Verify"**

✅ Votre domaine devrait être vérifié !

---

## Étape 3 : Créer une Clé API

1. Allez sur **https://resend.com/api-keys**
2. Cliquez sur **"Create API Key"**
3. Donnez un nom : `DynaScrib Contact Form`
4. Permissions : **Full Access** (ou seulement "Send emails" pour plus de sécurité)
5. Cliquez sur **"Create"**
6. **COPIEZ LA CLÉ** (elle commence par `re_...`)
   ⚠️ Vous ne pourrez plus la voir après !

---

## Étape 4 : Configurer le Fichier config.php

### A. Créer le fichier config.php

```bash
# Sur votre Mac
cd /Users/jean/dynascrib_public
cp config.example.php config.php
```

### B. Éditer config.php

Ouvrez `config.php` et remplissez :

```php
// Configuration Resend
define('RESEND_API_KEY', 're_VOTRE_VRAIE_CLE_API_ICI'); // ← Collez votre clé API

// Configuration Email
define('EMAIL_FROM', 'contact@dynascrib.com'); // ← Email expéditeur
define('EMAIL_TO', 'contact@dynascrib.com'); // ← Votre email pour recevoir les messages
define('EMAIL_REPLY_TO', 'noreply@dynascrib.com');

// Configuration Site
define('SITE_URL', 'https://dynascrib.com');
define('SITE_NAME', 'DynaScrib');

// Environnement
define('ENVIRONMENT', 'development'); // ← Changez en 'production' sur le serveur
```

**⚠️ IMPORTANT :** Ne commitez JAMAIS `config.php` dans Git !
Le fichier est déjà dans `.gitignore` pour vous protéger.

---

## Étape 5 : Tester en Local (Optionnel)

### A. Installer PHP en local (si pas déjà fait)

```bash
# Vérifier que PHP est installé
php -v
```

### B. Lancer un serveur local

```bash
cd /Users/jean/dynascrib_public
php -S localhost:8000
```

### C. Tester le formulaire

1. Ouvrez **http://localhost:8000/contact.php**
2. Remplissez le formulaire
3. Envoyez
4. Vous devriez recevoir l'email à `EMAIL_TO` !

---

## Étape 6 : Déployer sur le VPS

### A. Uploader les fichiers

Uploadez tous les fichiers **SAUF config.php** :

```bash
# Via SCP (depuis votre Mac)
cd /Users/jean/dynascrib_public
scp -r *.php includes/ assets/ votre_user@votre_vps.infomaniak.ch:/var/www/dynascrib.com/
```

### B. Créer config.php sur le serveur

```bash
# Connectez-vous au VPS
ssh votre_user@votre_vps.infomaniak.ch

# Allez dans le dossier du site
cd /var/www/dynascrib.com

# Créez config.php depuis l'exemple
cp config.example.php config.php

# Éditez config.php
nano config.php
```

Remplissez avec vos vraies valeurs et changez :

```php
define('ENVIRONMENT', 'production'); // ← Important : production sur le serveur !
```

Sauvegardez : **Ctrl+O** → **Entrée** → **Ctrl+X**

### C. Vérifier les permissions

```bash
# Le fichier config.php ne doit pas être lisible publiquement
chmod 600 config.php

# Les autres fichiers PHP doivent être lisibles par le serveur web
chmod 644 *.php
chmod 644 send-contact.php
```

---

## Étape 7 : Tester en Production

1. Allez sur **https://dynascrib.com/contact**
2. Remplissez le formulaire avec vos vraies informations
3. Cliquez sur **"Envoyer le message"**
4. Vous devriez :
   - Voir un message de succès vert
   - Recevoir l'email dans votre boîte `EMAIL_TO`

---

## Vérifier que Tout Fonctionne

### A. Consulter les logs Resend

1. Allez sur **https://resend.com/emails**
2. Vous devriez voir vos emails envoyés
3. Statut : **Delivered** ✅

### B. Vérifier les logs du serveur (si erreur)

```bash
# Sur le VPS
tail -f /var/log/apache2/dynascrib_error.log
```

---

## Résolution de Problèmes

### ❌ Erreur : "Une erreur est survenue lors de l'envoi"

**Causes possibles :**
1. Clé API incorrecte
2. Domaine pas vérifié dans Resend
3. cURL pas installé sur le serveur

**Solutions :**
```bash
# Vérifier que cURL est installé
php -m | grep curl

# Si absent, installer :
sudo apt install php-curl
sudo systemctl restart apache2
```

### ❌ L'email n'arrive pas

**Vérifications :**
1. Vérifiez les spams
2. Vérifiez que `EMAIL_FROM` est bien `contact@dynascrib.com`
3. Vérifiez que le domaine est vérifié dans Resend
4. Consultez les logs Resend : https://resend.com/emails

### ❌ Erreur 500 Internal Server Error

**Causes :**
1. Erreur de syntaxe PHP
2. config.php manquant
3. Permissions incorrectes

**Solutions :**
```bash
# Voir les erreurs PHP
tail -f /var/log/apache2/dynascrib_error.log

# Vérifier que config.php existe
ls -la config.php

# Corriger les permissions
chmod 600 config.php
chown www-data:www-data config.php
```

---

## Sécurité

### ✅ Bonnes Pratiques

1. **Ne jamais exposer config.php**
   - Il est dans `.gitignore`
   - Permissions : 600 (lisible uniquement par le propriétaire)

2. **Protéger la clé API**
   - Ne jamais la partager
   - Ne jamais la commiter
   - Régénérer si compromise

3. **Limiter les permissions de la clé API**
   - Donnez uniquement "Send emails" au lieu de "Full Access"

4. **Protection anti-spam**
   - Honeypot activé (champ caché)
   - Validation côté serveur
   - Limite de 5000 caractères

### 🔐 En Cas de Compromission

Si votre clé API est exposée :
1. Allez sur https://resend.com/api-keys
2. Supprimez l'ancienne clé
3. Créez une nouvelle clé
4. Mettez à jour `config.php`

---

## Limites du Plan Gratuit Resend

- **100 emails/jour** gratuit
- **3 000 emails/mois** gratuit
- Domaines illimités
- Parfait pour un site de contact !

Si vous dépassez, passez au plan payant (20$/mois pour 50k emails).

---

## Résumé des Fichiers

| Fichier | Description | Commit Git ? |
|---------|-------------|--------------|
| `config.example.php` | Template de config | ✅ Oui |
| `config.php` | Config réelle avec clé API | ❌ Non (.gitignore) |
| `send-contact.php` | Script d'envoi | ✅ Oui |
| `contact.php` | Formulaire mis à jour | ✅ Oui |
| `.gitignore` | Protège config.php | ✅ Oui |

---

## Support

**Documentation Resend :**
https://resend.com/docs

**API Resend :**
https://resend.com/docs/api-reference/emails/send-email

**Dashboard Resend :**
https://resend.com/emails

---

✅ **Votre formulaire de contact est maintenant opérationnel avec Resend !**

Les messages seront envoyés avec un magnifique template HTML responsive.
