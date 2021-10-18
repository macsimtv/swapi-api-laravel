# Readme

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
	- Requête POST sur /auth/login avec le token précedement obtenu dans le header, et les identifiants dans le corp de la requête

swagger.yaml: fichier de description des routes
