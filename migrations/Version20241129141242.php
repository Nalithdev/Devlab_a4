<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241129141242 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE materielles (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, types VARCHAR(255) DEFAULT NULL, etat VARCHAR(255) DEFAULT NULL, INDEX IDX_1FC39BADA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE materielles ADD CONSTRAINT FK_1FC39BADA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE materielles DROP FOREIGN KEY FK_1FC39BADA76ED395');
        $this->addSql('DROP TABLE materielles');
    }
}
