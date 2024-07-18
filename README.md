
## A propos de l'application
Cette application permet de créer, lire, modifier et supprimer des profils de personnes. Chaque profil est composé du prénom, du nom, de la description et d'une photo.

On retrouve dans cette application trois parties :
 - La partie publique, qui permet d'afficher la liste des profils et les détails de chaque profil.
 - Le back-office, réalisé avec le package filament, qui permet d'ajouter et de mettre à jour les profils. Le back-office est également utile pour créer des administrateurs, qui auront le droit de créer/modifier/supprimer les profils.
 - L'API, qui repose sur un système de PAT (Personal Access Token)



## Mise en place de l'environement de developpement
### Prérequis
- Docker
- PHP (utile lors de la première installation des dépendances)
- Composer (utile lors de la première installation des dépendances)
### Préparation de l'environnement
- `git clone git@github.com:msuchail/hello-cse.git`
- ouvrir le projet dans l'IDE
- Installation des dépendances `composer install`
- Copie du fichier du ficher .env `cp .env.example .env`
- Lancement des conteneurs `./vendor/bin/sail up -d`
- Création d'un lien symbolique pour le stockage des images `./vendor/bin/sail artisan storage:link`
- Création de la clé d'application `./vendor/bin/sail artisan key:generate`
- Seed avec la commande `./vendor/bin/sail artisan migrate --seed`. Le seed des profils peut prendre un peu de temps, car l'application va télécharger en fond de fausses images de profil via l'API https://thispersondoesnotexist.com/
- Installation des dépendances npm `./vendor/bin/sail npm install`
- Lancement du serveur vite `./vendor/bin/sail npm run dev`
- Pour arrêter l'application, executer la commande `./vendor/bin/sail down`


## Utilisation de l'application
### Accès à l'application
- Le front est accessible à l'adresse `http://localhost`
- Le back-office est accessible à l'adresse `http://localhost/admin`
- Les identifiants de connexion sont les suivants (front et back) :
- email : `admin@admin.fr`
- mot de passe : `admin`
- En vous connectant au back-office, vous pourrez créer de nouveaux comptes administrateurs, et gérer les profils.
- Depuis le front, vous pourrez consulter la liste des profils, et les détails de chaque profil. Vous pourrez également générer jusqu'à 4 tokens par compte admin.
### Utilisation de l'API
- L'accès à l'API se fait à l'adresse `http://localhost/api/`
- La route publique (accessible sans token) :
  - `GET /profiles` : Liste des profils
- Les routes privées nécessitent un token d'authentification :
  - `POST /profiles` : Création d'un profil
  - `POST /profiles/{id}` : Mise à jour d'un profil
  - `DELETE /profiles/{id}` : Suppression d'un profil
- Pour accéder aux routes privées, il faut ajouter un header `Authorization` avec la valeur `Bearer <token>` dans le corps requête.
- Si vous souahaiter utiliser l'API, vous pouvez récupérer directement la collection Postman. Il s'agi du fichier `collection postman.json`, disponible à la racine de l'application. <strong>Pensez bien à remplacer le token dans les paramètres de la collection!</strong>
