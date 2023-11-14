<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231114145753 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD first_name VARCHAR(255) DEFAULT NULL, ADD last_name VARCHAR(255) DEFAULT NULL, ADD company_name VARCHAR(255) DEFAULT NULL, ADD birth DATE DEFAULT NULL, ADD phonenumber VARCHAR(255) NOT NULL, ADD address VARCHAR(255) NOT NULL, ADD zip_code VARCHAR(255) NOT NULL, ADD city VARCHAR(255) NOT NULL, ADD motivation VARCHAR(255) DEFAULT NULL, ADD pdf VARCHAR(255) DEFAULT NULL, ADD logo VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP first_name, DROP last_name, DROP company_name, DROP birth, DROP phonenumber, DROP address, DROP zip_code, DROP city, DROP motivation, DROP pdf, DROP logo');
    }
}
