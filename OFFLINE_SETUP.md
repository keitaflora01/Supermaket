OFFLINE_SETUP - Installer le projet hors-ligne
============================================

Ce document décrit comment préparer une machine connectée à Internet pour récupérer tous les paquets système et assets nécessaires afin d'exécuter le projet
`supermaket` sur une machine isolée (sans accès Internet).

Les étapes sont prévues pour Debian/Ubuntu. Adaptez pour d'autres distributions (RHEL/CentOS) avec `yumdownloader` / dépôt local.

Résumé
------
- Installer sur la machine offline : serveur web (apache2 ou nginx), PHP (+ extensions), PostgreSQL (si vous voulez la DB locale).
- Générer un "bundle" apt (.zip) avec `apt-offline` depuis une machine connectée puis l'installer sur la machine offline.
- Compiler Tailwind CSS et télécharger les polices Google sur la machine connectée puis copier les fichiers (`tailwind.css`, polices) dans le projet offline sous `assets/`.
- Importer la base `supermaket.sql` localement.

1) Paquets système recommandés (Debian/Ubuntu)
------------------------------------------------
Liste suggérée à installer sur la machine offline :

- apache2
- php
- libapache2-mod-php (ou php-fpm si vous utilisez nginx)
- php-pgsql
- php-mbstring
- php-xml
- php-curl
- php-gd
- postgresql
- postgresql-client
- unzip, wget, curl

2) Préparer la signature apt sur la machine offline
--------------------------------------------------
Sur la machine offline (celle qui doit être mise à jour mais qui n'a pas Internet), installez `apt-offline` si déjà présent sinon téléchargez son .deb depuis une machine connectée (voir note plus bas). Puis :

```bash
# Crée un fichier de signature listant les paquets à récupérer
sudo apt-offline set /tmp/apt.sig --install-packages apache2,php,libapache2-mod-php,php-pgsql,php-mbstring,php-xml,php-curl,php-gd,postgresql,postgresql-client,unzip,wget,curl
```

Copiez `/tmp/apt.sig` sur la machine connectée (clé USB, scp, etc.).

3) Sur la machine connectée : récupérer le bundle complet
--------------------------------------------------------
Prérequis : `apt-offline` installé sur la machine connectée.

```bash
# télécharge tous les .deb nécessaires et créé un bundle zip
sudo apt-offline get /path/to/apt.sig --bundle /path/to/apt-offline-bundle.zip
```

Le fichier `/path/to/apt-offline-bundle.zip` contient tous les .deb et peut être copié sur la machine offline.

4) Installer le bundle sur la machine offline
--------------------------------------------
Copiez le `apt-offline-bundle.zip` sur la machine offline puis :

```bash
sudo apt-offline install /path/to/apt-offline-bundle.zip
# ensuite normalisez l'installation (si besoin)
sudo apt-get update
sudo apt-get install apache2 php libapache2-mod-php php-pgsql postgresql
```

Notes :
- Si `apt-offline` n'est pas installé sur la machine offline au départ, récupérez son .deb (`apt-offline_*.deb`) sur la machine connectée via `apt-get download apt-offline` et installez-le manuellement (`sudo dpkg -i apt-offline_*.deb`) en copiant aussi ses dépendances.
- Alternative avancée : créez un miroir apt local (deb mirror) sur la machine connectée et pointez la machine offline dessus.

5) Générer Tailwind CSS et télécharger les polices (machine connectée)
---------------------------------------------------------------------
Le projet utilise actuellement des CDN (Tailwind via `https://cdn.tailwindcss.com` et Google Fonts).
Pour fonctionner offline, compilez un fichier CSS Tailwind local et téléchargez les fichiers de polices WOFF2.

Exemple de procédure rapide (sur machine connectée, requiert node/npm) :

```bash
mkdir /tmp/tailwind-build && cd /tmp/tailwind-build
npm init -y
npm install -D tailwindcss postcss autoprefixer
echo "@tailwind base;\n@tailwind components;\n@tailwind utilities;" > input.css
npx tailwindcss -i ./input.css -o ./tailwind.css --minify
# résultat : tailwind.css (copiez-le dans le projet offline sous assets/css/)
```

Télécharger les polices Google :
- Utilisez un outil comme "google-webfonts-helper" (https://google-webfonts-helper.herokuapp.com/) qui permet de récupérer directement les fichiers `.woff2` et un snippet `@font-face`.
- Placez les `.woff2` dans `assets/fonts/` et créez `assets/css/fonts.css` avec les règles `@font-face` fournies.

6) Copier les fichiers front-end dans le projet offline
-----------------------------------------------------
Sur la machine connectée, après avoir généré `tailwind.css` et téléchargé les polices, copiez :

- `tailwind.css` -> `/var/www/html/supermaket/assets/css/tailwind.css`
- les fichiers `.woff2` -> `/var/www/html/supermaket/assets/fonts/`
- `fonts.css` -> `/var/www/html/supermaket/assets/css/fonts.css`

7) Modifier `tamplate.html` (ou `tamplate.html`) pour pointer vers ces fichiers locaux
-------------------------------------------------------------------------------------
Remplacez les références CDN par :

```html
<link rel="stylesheet" href="assets/css/tailwind.css">
<link rel="stylesheet" href="assets/css/fonts.css">
```

Je peux appliquer cette modification automatiquement si vous le souhaitez. (Note : le projet contient aussi un autre `tamplate.html` déjà present — je peux le modifier.)

8) Importer la base de données PostgreSQL
----------------------------------------
Sur la machine offline où `postgresql` est installé :

```bash
# créer la BDD (si non existante)
sudo -u postgres createdb supermaket
# importer le dump
sudo -u postgres psql -d supermaket -f /var/www/html/supermaket/supermaket.sql
```

Ajustez les credentiels dans `config/db.php` si nécessaire.

9) Vérifications et démarrage
----------------------------

Vérifiez que l'extension pdo_pgsql est chargée :

```bash
php -m | grep pdo_pgsql || php -r "var_dump(extension_loaded('pdo_pgsql'));"
```

Redémarrez Apache :

```bash
sudo systemctl restart apache2
sudo systemctl status apache2
```

Puis visitez `http://localhost/` depuis un navigateur sur la machine offline.

Fichiers utiles créés par ce dépôt :
- `scripts/generate_offline_bundle.sh` — script d'aide à exécuter sur la machine connectée (génère le bundle apt et compile Tailwind si demandé).

Support / alternatives
----------------------
- Si vous ne voulez pas installer npm/tailwind, copiez simplement un fichier Tailwind CSS précompilé (par ex. téléchargé depuis un CDN sur la machine connectée) et les polices.
- Pour RHEL/CentOS adaptez la méthode de téléchargement des RPM (`yumdownloader`) et créez un dépôt local.

-- Fin du guide
