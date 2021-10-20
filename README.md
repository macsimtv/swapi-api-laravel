# STARWARS API 

Toutes les données Star Wars dont vous avez toujours rêvé :
Planètes,  vaisseaux spatiaux, 🚗 véhicules, 🙍‍♂️ personnes, 🎬 films et 👾 espèces
De tous les SEPT films Star Wars ⭐

😍 Maintenant avec les données du Réveil de la Force ! 😍

# Les routes

L'API a pour base */api/v1*

Les routes sont décomposées de la manière suivante:
- /films
	- Affiche tout les films
	- /{id}: film avec l'identifiant **id**
- /planets
	- Affiche toute les planètes
	- {id}: planète avec l'identifiant **id**
- /starships
	- Affiche tous les vaisseaux
	- {id}: vaisseau avec l'identifiant **id**
- /species
	- Affiche toutes les espèces
	- {id}: espèce avec l'identifiant
- /peoples
	- Affiche toutes les personnes
	- {id}: personne avec l'identifiant
- /vehicle
	- Affiche tout les véhicules
	- {id}: véhicules avec l'identifiant

# Authentification

Pour accéder à ces ressources, il est nécessaire de s'authentifiant préalablement.

Etapes:
- Créer un utilisateur
	- Requête POST sur /auth/register avec dans le corp de la requête, l'utilisateur
- Obtenir un token
	- Requête POST sur /auth/login

Un fichier swagger.yaml est à disposition

# Installation

Pour installer les dépendances, il suffit de taper la commande suivante dans le répertoire du projet:
> composer install

Toutes les dépendances sont téléchargées.

## Récupération des données depuis l'API swapi.dev

Afin de récupérer les données existantes depuis l'api, il suffit d'exécuter la commande suivante, une fois placé dans le répertoire:
> php artisan data:scrape

Cette commande récupère les données pour les insérer dans la base de données configurée en paramètre

## Test de fonctionnement

Afin de tester le bon fonctionnement, et la présence des données, vous pouvez utiliser le swagger à travers un éditeur en ligne (https://editor.swagger.io/)

### Développeur

Romain Buisson - Maxime Lecouturier - Aya Haddad - Romain Neil
