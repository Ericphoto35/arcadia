<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240511192230 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animals (id INT AUTO_INCREMENT NOT NULL, habitatani_id INT DEFAULT NULL, prenomani VARCHAR(30) DEFAULT NULL, raceani VARCHAR(30) DEFAULT NULL, imageani VARCHAR(60) DEFAULT NULL, INDEX IDX_966C69DD5E941829 (habitatani_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE habitats (id INT AUTO_INCREMENT NOT NULL, habitatnom VARCHAR(30) DEFAULT NULL, habitatdescription VARCHAR(255) DEFAULT NULL, habitatimage VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE horaires_zoo (id INT AUTO_INCREMENT NOT NULL, debut TIME DEFAULT NULL, fin TIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE animals ADD CONSTRAINT FK_966C69DD5E941829 FOREIGN KEY (habitatani_id) REFERENCES habitats (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animals DROP FOREIGN KEY FK_966C69DD5E941829');
        $this->addSql('DROP TABLE animals');
        $this->addSql('DROP TABLE habitats');
        $this->addSql('DROP TABLE horaires_zoo');
    }
}
