<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200809143200 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE patient_maladie DROP FOREIGN KEY FK_F0A757A06B899279');
        $this->addSql('ALTER TABLE patient_maladie DROP FOREIGN KEY FK_F0A757A0B4B1C397');
        $this->addSql('ALTER TABLE patient_maladie ADD CONSTRAINT FK_F0A757A06B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE patient_maladie ADD CONSTRAINT FK_F0A757A0B4B1C397 FOREIGN KEY (maladie_id) REFERENCES maladie (id)');
        $this->addSql('ALTER TABLE patient_medecin DROP FOREIGN KEY FK_46B9062D4F31A84');
        $this->addSql('ALTER TABLE patient_medecin DROP FOREIGN KEY FK_46B9062D6B899279');
        $this->addSql('ALTER TABLE patient_medecin ADD CONSTRAINT FK_46B9062D4F31A84 FOREIGN KEY (medecin_id) REFERENCES medecin (id)');
        $this->addSql('ALTER TABLE patient_medecin ADD CONSTRAINT FK_46B9062D6B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE patient_maladie DROP FOREIGN KEY FK_F0A757A06B899279');
        $this->addSql('ALTER TABLE patient_maladie DROP FOREIGN KEY FK_F0A757A0B4B1C397');
        $this->addSql('ALTER TABLE patient_maladie ADD CONSTRAINT FK_F0A757A06B899279 FOREIGN KEY (patient_id) REFERENCES patient (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE patient_maladie ADD CONSTRAINT FK_F0A757A0B4B1C397 FOREIGN KEY (maladie_id) REFERENCES maladie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE patient_medecin DROP FOREIGN KEY FK_46B9062D6B899279');
        $this->addSql('ALTER TABLE patient_medecin DROP FOREIGN KEY FK_46B9062D4F31A84');
        $this->addSql('ALTER TABLE patient_medecin ADD CONSTRAINT FK_46B9062D6B899279 FOREIGN KEY (patient_id) REFERENCES patient (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE patient_medecin ADD CONSTRAINT FK_46B9062D4F31A84 FOREIGN KEY (medecin_id) REFERENCES medecin (id) ON DELETE CASCADE');
    }
}
