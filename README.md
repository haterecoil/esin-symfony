# ESIN

Projet pédagogique e-commerce

## Démarrage

Pour installer et mettre en route les services docker (php, nginx, mysql/mariadb) :

1. Cloner le repo git
2. Configurer les fichiers .env et /app/.env
3. `docker-compose up`

 

### Cloner le repo : 

```bash
# cloner le répertoire git
git clone https://gitlab.com/haterecoil/esin-symfony.git;
```

### Démarrer docker :

```bash
docker compose up;

# optionellement (selon votre version de docker)
docker-compose up;
```

### Configurer l'environnement

Copier/coller le fichier `/.env` en `/.env.local` et modifier les valeurs tel que souhaité.

Copier/coller le fichier `/app/.env` en `/app/.env.local` et modifier les valeurs, notamment 

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