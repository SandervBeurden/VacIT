<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231114145331 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE applications (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, vacancy_id INT NOT NULL, date DATE NOT NULL, invited TINYINT(1) NOT NULL, INDEX IDX_F7C966F0A76ED395 (user_id), INDEX IDX_F7C966F0433B78C4 (vacancy_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE applications ADD CONSTRAINT FK_F7C966F0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE applications ADD CONSTRAINT FK_F7C966F0433B78C4 FOREIGN KEY (vacancy_id) REFERENCES vacancies (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE applications DROP FOREIGN KEY FK_F7C966F0A76ED395');
        $this->addSql('ALTER TABLE applications DROP FOREIGN KEY FK_F7C966F0433B78C4');
        $this->addSql('DROP TABLE applications');
    }
}
