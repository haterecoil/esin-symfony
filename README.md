# ESIN

Projet pédagogique e-commerce

## Démarrage

Pour installer et mettre en route les services docker (php, nginx, mysql/mariadb) :

```bash
# cloner le répertoire git
git clone https://gitlab.com/haterecoil/esin-symfony.git;

# démarrer docker
docker compose up;

# optionellement (selon votre version de docker)
docker-compose up;
```

## Particularités de docker

Comme on utilise Docker, on ne peux pas exécuter les commandes symfony habituelles. 

Quand vous voyez une commande qui commencent par `composer` ou `bin/console` il faut y ajouter `docker-compose exec php `.

Exemples : 
-  `docker-compose exec php composer --version`
-  `docker-compose exec php bin/console --version`


### docker-compose ou docker compose ?

Selon votre version de docker, il vous faudra utiliser l'un ou l'autre. 