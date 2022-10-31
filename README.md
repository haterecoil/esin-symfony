# ESIN

Projet pédagogique e-commerce

## Démarrage

Pour installer et mettre en route les services docker (php, nginx, mysql/mariadb) :

1. Cloner le repo git
2. Configurer les fichiers .env et /app/.env
3. `docker-compose up`


Vous pouvez accéder à : `http://127.0.0.1:38080` !


PS: le port dépend de la valeur NET_NGINX_PORT dans votre /.env
 

### Cloner le repo

```bash
# cloner le répertoire git
git clone https://gitlab.com/haterecoil/esin-symfony.git;
```

### Configurer l'environnement

Copier/coller le fichier `/.env` en `/.env.local` et modifier les valeurs tel que souhaité.

Copier/coller le fichier `/app/.env` en `/app/.env.local` et modifier les valeurs, notamment 


### Démarrer docker :

```bash
docker compose up;

# optionellement (selon votre version de docker)
docker-compose up;
```

## Configuration

Docker : 
- copier/coller le fichier `/.env` en `/.env.local` et modifier les valeurs

le fichier `/app/.env` d

## Particularités de docker

Comme on utilise Docker, on ne peux pas exécuter les commandes symfony habituelles. 

Quand vous voyez une commande qui commencent par `composer` ou `bin/console` il faut y ajouter `docker-compose exec php `.

Exemples : 
-  `docker-compose exec php composer --version`
-  `docker-compose exec php bin/console --version`


### docker-compose ou docker compose ?

Selon votre version de docker, il vous faudra utiliser l'un ou l'autre. 

# To-do list


Site e-commerce : 
- page d'accueil
- page de contact
- liste de produits
- un panier

Lundi 31 octobre 
- formulaires ! avec twig 
- définir les entités

## 31 octobre

Création de page d'accueil et de listing produit : 
1. Ajout de twig `docker-compose exec php composer require twig`
2. Création d'un Controller Index `docker-compose exec php bin/console make:controller`
3. Création d'un Controller Item `docker-compose exec php bin/console make:controller`