<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://www.editions-tissot.fr/wp-content/uploads/2020/10/logo-hcse.png" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## A propos de l'application
<p>Cette application permet de créer, lire, modifier et supprimer des profils de personnes. <br>Chaque profil est composé du prénom, du nom, de la description et d'une photo de la personne.</p>
<p>On retrouve dans cette application deux parties : 
<ol>
    <li>La partie publique, qui permet d'afficher la liste des profils et les détails de chaques profils</li>
    <li>Le back-office, réalisé avec le package filament, qui permet d'ajouter, et de mettre à jour les profils</li>
</ol>


## Mise en place de l'environement de developpement
### Prérequis
- Docker
- PHP (utile lors de la première installation des dépendances)
- Composer (utile lors de la première installation des dépendances)
### Préparation de l'environnement
- git clone git@github.com:msuchail/hello-cse.git
- ouvrir le projet dans l'IDE
- Dans le terminal, executer la commande `php composer install`
- Lancer l'applicaiton dans le terminal avec la commande `./vendor/bin/sail up`
- Dans un second terminal, lancer les migrations et le seed avec la commande `./vendor/bin/sail artisan migrate --seed`. <br><strong>Le seed des profils peut prendre un peu de temps, car l'application va télécharger en fond de fausses images de profil via l'API https://thispersondoesnotexist.com/</strong>
- Installer les dépendances front avec la commande `./vendor/bin/sail npm install`
- Démarer le serveur vite avec la commande `./vendor/bin/sail npm run dev`
- Accéder à la partie publique à l'adresse http://localhost
- Pour accéder au back-office, se rendre à l'adresse http://localhost/admin, et utiliser les identifiants suivants : 
    - email : admin@admin.fr
    - mot de passe : admin
- Pour arrêter l'application, executer la commande `./vendor/bin/sail down`
