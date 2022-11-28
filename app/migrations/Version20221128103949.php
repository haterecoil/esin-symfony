<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221128103949 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE checkout (id INT AUTO_INCREMENT NOT NULL, shipping_address LONGTEXT DEFAULT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE checkout_product (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, checkout_id INT DEFAULT NULL, quantity INT NOT NULL, INDEX IDX_2F21E0D44584665A (product_id), INDEX IDX_2F21E0D4146D8724 (checkout_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE checkout_product ADD CONSTRAINT FK_2F21E0D44584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE checkout_product ADD CONSTRAINT FK_2F21E0D4146D8724 FOREIGN KEY (checkout_id) REFERENCES checkout (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE checkout_product DROP FOREIGN KEY FK_2F21E0D44584665A');
        $this->addSql('ALTER TABLE checkout_product DROP FOREIGN KEY FK_2F21E0D4146D8724');
        $this->addSql('DROP TABLE checkout');
        $this->addSql('DROP TABLE checkout_product');
    }
}
