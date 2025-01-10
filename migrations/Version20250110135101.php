<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250110135101 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adresse_formation DROP adresse');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BFDF99DB2A');
        $this->addSql('DROP INDEX IDX_404021BFDF99DB2A ON formation');
        $this->addSql('ALTER TABLE formation CHANGE description description LONGTEXT DEFAULT NULL, CHANGE url url LONGTEXT DEFAULT NULL, CHANGE adresse_formation_id_id adresse_formation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF627BD93E FOREIGN KEY (adresse_formation_id) REFERENCES adresse_formation (id)');
        $this->addSql('CREATE INDEX IDX_404021BF627BD93E ON formation (adresse_formation_id)');
        $this->addSql('ALTER TABLE user ADD nom VARCHAR(255) DEFAULT NULL, ADD prenom VARCHAR(255) DEFAULT NULL, ADD gain DOUBLE PRECISION DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adresse_formation ADD adresse LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BF627BD93E');
        $this->addSql('DROP INDEX IDX_404021BF627BD93E ON formation');
        $this->addSql('ALTER TABLE formation CHANGE description description LONGTEXT NOT NULL, CHANGE url url LONGTEXT NOT NULL, CHANGE adresse_formation_id adresse_formation_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BFDF99DB2A FOREIGN KEY (adresse_formation_id_id) REFERENCES adresse_formation (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_404021BFDF99DB2A ON formation (adresse_formation_id_id)');
        $this->addSql('ALTER TABLE user DROP nom, DROP prenom, DROP gain');
    }
}
