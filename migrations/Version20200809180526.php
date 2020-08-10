<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200809180526 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE conseil (id INT AUTO_INCREMENT NOT NULL, medecin_id INT DEFAULT NULL, contenu VARCHAR(255) DEFAULT NULL, INDEX IDX_3F3F06814F31A84 (medecin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE consultation (id INT AUTO_INCREMENT NOT NULL, patient_id INT DEFAULT NULL, dete_deconsultation DATE NOT NULL, temperature VARCHAR(255) DEFAULT NULL, pression_arterielle VARCHAR(255) DEFAULT NULL, frequence_cardiauqe VARCHAR(255) DEFAULT NULL, INDEX IDX_964685A66B899279 (patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE maladie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medecin (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) DEFAULT NULL, roles JSON DEFAULT NULL, password VARCHAR(255) NOT NULL, prenom VARCHAR(255) DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) DEFAULT NULL, date_naissance DATE DEFAULT NULL, specialite VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_1BDA53C6E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patient (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) DEFAULT NULL, roles JSON DEFAULT NULL, password VARCHAR(255) NOT NULL, prenom VARCHAR(255) DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) DEFAULT NULL, age VARCHAR(255) NOT NULL, qrcode VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_1ADAD7EBE7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patient_maladie (patient_id INT NOT NULL, maladie_id INT NOT NULL, INDEX IDX_F0A757A06B899279 (patient_id), INDEX IDX_F0A757A0B4B1C397 (maladie_id), PRIMARY KEY(patient_id, maladie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patient_medecin (patient_id INT NOT NULL, medecin_id INT NOT NULL, INDEX IDX_46B9062D6B899279 (patient_id), INDEX IDX_46B9062D4F31A84 (medecin_id), PRIMARY KEY(patient_id, medecin_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proche (id INT AUTO_INCREMENT NOT NULL, patient_id INT DEFAULT NULL, email VARCHAR(180) DEFAULT NULL, roles JSON DEFAULT NULL, password VARCHAR(255) NOT NULL, prenom VARCHAR(255) DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_80DAF999E7927C74 (email), INDEX IDX_80DAF9996B899279 (patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) DEFAULT NULL, roles JSON DEFAULT NULL, password VARCHAR(255) NOT NULL, prenom VARCHAR(255) DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE conseil ADD CONSTRAINT FK_3F3F06814F31A84 FOREIGN KEY (medecin_id) REFERENCES medecin (id)');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A66B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE patient_maladie ADD CONSTRAINT FK_F0A757A06B899279 FOREIGN KEY (patient_id) REFERENCES patient (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE patient_maladie ADD CONSTRAINT FK_F0A757A0B4B1C397 FOREIGN KEY (maladie_id) REFERENCES maladie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE patient_medecin ADD CONSTRAINT FK_46B9062D6B899279 FOREIGN KEY (patient_id) REFERENCES patient (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE patient_medecin ADD CONSTRAINT FK_46B9062D4F31A84 FOREIGN KEY (medecin_id) REFERENCES medecin (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE proche ADD CONSTRAINT FK_80DAF9996B899279 FOREIGN KEY (patient_id) REFERENCES proche (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patient_maladie DROP FOREIGN KEY FK_F0A757A0B4B1C397');
        $this->addSql('ALTER TABLE conseil DROP FOREIGN KEY FK_3F3F06814F31A84');
        $this->addSql('ALTER TABLE patient_medecin DROP FOREIGN KEY FK_46B9062D4F31A84');
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A66B899279');
        $this->addSql('ALTER TABLE patient_maladie DROP FOREIGN KEY FK_F0A757A06B899279');
        $this->addSql('ALTER TABLE patient_medecin DROP FOREIGN KEY FK_46B9062D6B899279');
        $this->addSql('ALTER TABLE proche DROP FOREIGN KEY FK_80DAF9996B899279');
        $this->addSql('DROP TABLE conseil');
        $this->addSql('DROP TABLE consultation');
        $this->addSql('DROP TABLE maladie');
        $this->addSql('DROP TABLE medecin');
        $this->addSql('DROP TABLE patient');
        $this->addSql('DROP TABLE patient_maladie');
        $this->addSql('DROP TABLE patient_medecin');
        $this->addSql('DROP TABLE proche');
        $this->addSql('DROP TABLE user');
    }
}
