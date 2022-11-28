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
- Migration (outil pour faire évoluer notre base de données)
- Repository (permet d'intéragir avec mes entités)

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
- - make:controller
- créer une fonction dans le Controller qui est liée à la route "/"
- - la fonction doit renvoyer un template twig 

Note: j'ai pas de produits !

#### Créer des produits (CRUD)

- créer une Entité "Product"
- - `make:entity`
- Migrer la base de donnée 
- - `make:migration`
- - `doctrine:migrations:migrate`
- créer un Controller "ProductController"
- - Create: une fonction pour créer (une fonction = un template)
- - Read: afficher le détail
- - Update: modifer le prduit
- - Delete: le supprimer :dead:

Product
- name           string 
- price          float
- description    longtext
- imageLink      string (stock un lien vers l'image)
- stock          int

(dans l'idéal : on utilise une librairie qui permet le CRUD d'image)

#### Rendre le produit

- lien "acheter"
- - input: ID du produit, quantité
- - output: affiche une page d'achact (adresse, code de carte bleue)

accueil (Home)
produits (Produit)
checkout (Checkout) -> créer un controller
- adresse -> route + formulaire
- paiement -> route + formulaire 
- confirmation de commande

entité "Checkout"
- adresse (un long texte avec l'adresse)
- - shippingAddress, text, nullable
- statut ('new', 'paid')
- - status, string, not nullable
- liste des articles choisis (des relations)
- - CheckoutProduct

entité CheckoutProduct
- ref Article (foreign key)
- - Product, foreign key
- quantité (int)
- - quantity, integer
- id checkout (foreign key)
- - Checkout, foreign key

1. créer Checkout (make:entity...) sans notion de CheckoutProduct
2. créer CheckoutProduct (make:entity..)

#### Features manquantes 

- rendre le site joli (styles, js)
- rendre le produit achetable 
- sécuriser l'authentification 
- mail de confirmation 



