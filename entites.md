
# Messages 

1. Besoin d'une table pour stocker les messages
2. Besoin de requetes pour créer, lire, mettre à jour, supprimer des messages (Create Read Update Delete - CRUD)
3. Besoin de code qui permette de : se connecter à la db, faire nos requete, ...

```sql

# créer une table

CREATE TABLE message {
    content     varchar(1000)       null,
    data        Date       null,
    topic       varchar(1000)Date       null,
}

# insérer de la data 

insert into message values ('bonjour', '2022-10-21');

# requetes

select * from message;
```


## Doctrine : un ORM

On a des `Entity`: pour représenter les tables et les lignes de ma base de données

```php
class Message extends Entity {
    public string $content;
    public Datetime $date;
}
```

On a des `Repository`: pour interagir avec ma base de données

```php
class MessageRepository {
    public function findByDate($date): Message[]
}
```

# Setup

Création de la base de données : `docker-compose exec php bin/console doctrine:database:create`

Migrations : https://symfony.com/doc/current/doctrine.html#migrations-creating-the-database-tables-schema