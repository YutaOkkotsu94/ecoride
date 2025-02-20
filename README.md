# Ecoride

EcoRide est une plateforme de covoiturage automobile dédiée à la réduction de l'empreinte carbone. Son objectif principal est de faciliter le partage de trajets entre utilisateurs, permettant ainsi de diminuer le nombre de véhicules sur la route. 

## Pour bien s'organiser

- Création du cahier des charges.
- Création d'un espace de travail sur Trello. 
- Lister les outils nécessaires aux tâches à réalisées.

## Installation

Téléchargement et configuration de Visual Studio Code

Téléchargement et configuration de XAMPP (MYSQL et Apache)

Installation du projet avec symfony

```bash
  symfony new my_project --version="7.2.x" --webapp
```
Utilisation du composer pour notre projet symfony 

```bash
composer create-project symfony/skeleton:"7.2.x" my_project_directory
cd my_project_directory
composer require webapp
````
## Démarrage

Ouvrir Git  bash ou votre dossier a été créé et insérer la commande :

```bash
code .
```
Cette commande ouvrira automatiquement votre projet sur visual studio code.


Ouvrir le terminal de VSC et éxécuter cette commande afin de tester si notre serveur fonctionne :

```bash
symfony server:start
```
Si la page symfony s'affiche, nous pouvons commencer notre projet !


## Développement avec

- Front-end :
    
    HTML5 & CSS3 : Structure et mise en page du site.
    
    JavaScript : Interactivité et gestion des événements.
    
    Figma : Outil de design pour la création des maquettes UI/UX.
    
    Canva : Utilisé pour la création du logo.

    Google Fonts : Permet de choisir la police idéales en fonction des besoins du client.

    Coolors : Utilisé pour générer une palette de couleurs harmonieuse et adaptée à l’identité écologique de la plateforme.

- Back-end :
    
    Symfony : Framework PHP pour l’architecture MVC.
    
    PHP 8 : Langage utilisé pour la logique métier.
    
    MariaDB : Base de données pour stocker les utilisateurs, trajets et réservations.
    
    PhpMyAdmin : Interface web pour la gestion de la base de données.

- Outils de gestion et environnement de travail :

    Visual Studio Code (VSC) : Éditeur de code principal.

    Trello : Suivi des tâches et gestion du projet.

    Git & GitHub : Gestion du code source et collaboration.

    XAMPP : Environnement de développement local qui m'a permis de tester et développer Ecoride en local avant de le déployer en production.

  ## Documentation

Figma community : https://www.figma.com/community

Symfony : https://symfony.com/doc/current/index.html

Github : https://docs.github.com/fr

Git : https://git-scm.com/docs/git

## Authors

Lakhdari Fares - [@YutaOkkotsu94](https://www.github.com/YutaOkkotsu94)
