<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231114144412 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vacancies_platform (vacancies_id INT NOT NULL, platform_id INT NOT NULL, INDEX IDX_33E263F7B1ACD019 (vacancies_id), INDEX IDX_33E263F7FFE6496F (platform_id), PRIMARY KEY(vacancies_id, platform_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vacancies_platform ADD CONSTRAINT FK_33E263F7B1ACD019 FOREIGN KEY (vacancies_id) REFERENCES vacancies (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vacancies_platform ADD CONSTRAINT FK_33E263F7FFE6496F FOREIGN KEY (platform_id) REFERENCES platform (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vacancies_platform DROP FOREIGN KEY FK_33E263F7B1ACD019');
        $this->addSql('ALTER TABLE vacancies_platform DROP FOREIGN KEY FK_33E263F7FFE6496F');
        $this->addSql('DROP TABLE vacancies_platform');
    }
}
