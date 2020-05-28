<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200528100543 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE venu (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `show` ADD venu_id INT DEFAULT NULL, DROP venu');
        $this->addSql('ALTER TABLE `show` ADD CONSTRAINT FK_320ED901A90E2126 FOREIGN KEY (venu_id) REFERENCES venu (id)');
        $this->addSql('CREATE INDEX IDX_320ED901A90E2126 ON `show` (venu_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `show` DROP FOREIGN KEY FK_320ED901A90E2126');
        $this->addSql('DROP TABLE venu');
        $this->addSql('DROP INDEX IDX_320ED901A90E2126 ON `show`');
        $this->addSql('ALTER TABLE `show` ADD venu VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP venu_id');
    }
}
