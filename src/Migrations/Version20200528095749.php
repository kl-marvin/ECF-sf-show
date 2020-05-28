<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200528095749 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE musical_style (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE city (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, zip VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `show` (id INT AUTO_INCREMENT NOT NULL, artist_id INT DEFAULT NULL, style_id INT DEFAULT NULL, city_id INT DEFAULT NULL, venu VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, date DATE NOT NULL, rate INT NOT NULL, comment VARCHAR(255) NOT NULL, INDEX IDX_320ED901B7970CF8 (artist_id), INDEX IDX_320ED901BACD6074 (style_id), INDEX IDX_320ED9018BAC62AF (city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artist (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `show` ADD CONSTRAINT FK_320ED901B7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id)');
        $this->addSql('ALTER TABLE `show` ADD CONSTRAINT FK_320ED901BACD6074 FOREIGN KEY (style_id) REFERENCES musical_style (id)');
        $this->addSql('ALTER TABLE `show` ADD CONSTRAINT FK_320ED9018BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `show` DROP FOREIGN KEY FK_320ED901BACD6074');
        $this->addSql('ALTER TABLE `show` DROP FOREIGN KEY FK_320ED9018BAC62AF');
        $this->addSql('ALTER TABLE `show` DROP FOREIGN KEY FK_320ED901B7970CF8');
        $this->addSql('DROP TABLE musical_style');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE `show`');
        $this->addSql('DROP TABLE artist');
    }
}
