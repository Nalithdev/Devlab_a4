<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241129155529 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adresse_formation ADD longitude NUMERIC(10, 8) NOT NULL, ADD latitude NUMERIC(10, 8) NOT NULL');
        $this->addSql('ALTER TABLE depots ADD latitude NUMERIC(10, 8) NOT NULL, ADD longitude NUMERIC(10, 8) NOT NULL, ADD description VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adresse_formation DROP longitude, DROP latitude');
        $this->addSql('ALTER TABLE depots DROP latitude, DROP longitude, DROP description');
    }
}
