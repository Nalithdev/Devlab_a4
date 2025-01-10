<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250110112552 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE materiel (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, types VARCHAR(255) NOT NULL, etat VARCHAR(255) NOT NULL, modele VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, statut VARCHAR(255) NOT NULL, INDEX IDX_18D2B0919D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE materiel ADD CONSTRAINT FK_18D2B0919D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE materielles DROP FOREIGN KEY FK_1FC39BADA76ED395');
        $this->addSql('DROP TABLE materielles');
        $this->addSql('ALTER TABLE adresse_formation CHANGE adresse adresse LONGTEXT NOT NULL, CHANGE longitude longitude DOUBLE PRECISION NOT NULL, CHANGE latitude latitude DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE depots CHANGE adresse adresse LONGTEXT NOT NULL, CHANGE latitude latitude DOUBLE PRECISION NOT NULL, CHANGE longitude longitude DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BF627BD93E');
        $this->addSql('DROP INDEX IDX_404021BF627BD93E ON formation');
        $this->addSql('ALTER TABLE formation CHANGE description description LONGTEXT NOT NULL, CHANGE url url LONGTEXT NOT NULL, CHANGE adresse_formation_id adresse_formation_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BFDF99DB2A FOREIGN KEY (adresse_formation_id_id) REFERENCES adresse_formation (id)');
        $this->addSql('CREATE INDEX IDX_404021BFDF99DB2A ON formation (adresse_formation_id_id)');
        $this->addSql('ALTER TABLE user DROP nom, DROP prenom, DROP gain');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE materielles (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, types VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_unicode_ci`, etat VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_unicode_ci`, modele VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, prix DOUBLE PRECISION NOT NULL, statut VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, INDEX IDX_1FC39BADA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE materielles ADD CONSTRAINT FK_1FC39BADA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE materiel DROP FOREIGN KEY FK_18D2B0919D86650F');
        $this->addSql('DROP TABLE materiel');
        $this->addSql('ALTER TABLE adresse_formation CHANGE adresse adresse VARCHAR(255) NOT NULL, CHANGE latitude latitude NUMERIC(10, 8) NOT NULL, CHANGE longitude longitude NUMERIC(10, 8) NOT NULL');
        $this->addSql('ALTER TABLE depots CHANGE adresse adresse VARCHAR(255) DEFAULT NULL, CHANGE latitude latitude NUMERIC(10, 8) NOT NULL, CHANGE longitude longitude NUMERIC(10, 8) NOT NULL');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BFDF99DB2A');
        $this->addSql('DROP INDEX IDX_404021BFDF99DB2A ON formation');
        $this->addSql('ALTER TABLE formation CHANGE description description VARCHAR(255) NOT NULL, CHANGE url url VARCHAR(255) NOT NULL, CHANGE adresse_formation_id_id adresse_formation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF627BD93E FOREIGN KEY (adresse_formation_id) REFERENCES adresse_formation (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_404021BF627BD93E ON formation (adresse_formation_id)');
        $this->addSql('ALTER TABLE user ADD nom VARCHAR(255) NOT NULL, ADD prenom VARCHAR(255) NOT NULL, ADD gain DOUBLE PRECISION DEFAULT NULL');
    }
}
