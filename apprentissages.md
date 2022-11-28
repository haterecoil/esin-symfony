# Twig : 

https://twig.symfony.com/

- un fichier parent
    - qui définit des blocs avec des valeurs par défaut
- des fichiers enfants
    - qui surchargent / override les blocs du parent

# Formulaires

https://symfony.com/doc/current/forms.html#installation

installation : `composer require symfony/form`

# Doctrine

https://www.doctrine-project.org/

C'est un ORM.

https://symfony.com/doc/current/doctrine.html#installing-doctrine

`docker-compose up -d`

# Thèmes appris

- Formulaires (créer des entités)
- Entités (garder en mémoire des informations)
- Templates (afficher les informations)
- Controller (afficehr une page en fonction d'une URL)

## Architecture

- page d'accueil
- liste de produits
- - produits ! (CRUD)
- - - CRUD = page d'administration
- - - - admin = authentification 
- panier
- page d'achat (adresse etc)

### Roadmap

#### Comment faire... ma page d'accueil

- créer un Controller: Home 
- créer une fonction dans le Controller qui est liée à la route "/"
- - la fonction doit renvoyer un template twig 

Note: j'ai pas de produits !

#### Créer des produits (CRUD)

- créer une Entité "Product"
- créer un Controlle "Product"
- - Create: une fonction pour créer (une fonction = un template)
- - Read: afficher le détail
- - Update: modifer le prduit
- - Delete: le supprimer :dead:

#### Modifier ma page d'accueil

- changer Controller et template pour afficher la liste des produits


#### Rendre les produits achetables 








