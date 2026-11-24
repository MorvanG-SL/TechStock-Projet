# TechStock : mise en place par FTP

## 1. Envoyer le site
Envoyer **tout le contenu** de ce dossier dans `/html/Projet_TechStock/` sur le serveur
(mode binaire, en conservant les fichiers cachés `.htaccess`).

    Projet_TechStock/
    ├── agent/    (NE PAS laisser sur le serveur après récupération, voir 4)
    ├── config/   database.php + api.php (token)
    ├── public/   site + api/inventory.php
    ├── sql/      schema.sql (seulement si les tables n'existent pas)
    └── src/

## 2. Base de données
Les tables `computers` et `software` doivent exister (voir `sql/schema.sql`).
Vérifier que `config/database.php` contient les bons identifiants.

## 3. Tester l'API depuis la Debian
    curl -i -X POST http://IP_SERVEUR/html/Projet_TechStock/public/api/inventory.php \
      -H "X-API-Token: <token de config/api.php>" -H "Content-Type: application/json" \
      -d '{"hostname":"TEST-PC","os_nom":"Windows 11","memoire_ram_go":16,"softwares":[{"name":"7-Zip","version":"23.01","publisher":"Igor Pavlov"}]}'
Réponse attendue : `{"status":"ok",...}` puis le poste TEST-PC apparaît dans le site.
Sans le bon token : 401.

## 4. Déployer l'agent sur les postes Windows
1. Vérifier `$ApiUrl` en haut de `agent/Inventaire-Agent.ps1`.
2. Sur un poste, PowerShell **en administrateur**, dans le dossier `agent/` :
       .\Install-Tache.ps1
3. Pour tout le parc : copier `agent/` dans un partage réseau et lancer
   `Install-Tache.ps1` via GPO (script de démarrage) ou Ansible.
Le token est écrit dans le script de l'agent : ne pas le laisser sur un partage lisible par tous.
