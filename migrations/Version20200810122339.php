<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200810122339 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patient_maladie DROP FOREIGN KEY FK_F0A757A0B4B1C397');
        $this->addSql('CREATE TABLE patient_proche (patient_id INT NOT NULL, proche_id INT NOT NULL, INDEX IDX_8B9410636B899279 (patient_id), INDEX IDX_8B94106337FB27F1 (proche_id), PRIMARY KEY(patient_id, proche_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE patient_proche ADD CONSTRAINT FK_8B9410636B899279 FOREIGN KEY (patient_id) REFERENCES patient (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE patient_proche ADD CONSTRAINT FK_8B94106337FB27F1 FOREIGN KEY (proche_id) REFERENCES proche (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE maladie');
        $this->addSql('DROP TABLE patient_maladie');
        $this->addSql('DROP TABLE patient_medecin');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE conseil DROP FOREIGN KEY FK_3F3F06814F31A84');
        $this->addSql('DROP INDEX IDX_3F3F06814F31A84 ON conseil');
        $this->addSql('ALTER TABLE conseil CHANGE contenu contenu VARCHAR(255) NOT NULL, CHANGE medecin_id consultation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE conseil ADD CONSTRAINT FK_3F3F068162FF6CDF FOREIGN KEY (consultation_id) REFERENCES consultation (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3F3F068162FF6CDF ON conseil (consultation_id)');
        $this->addSql('ALTER TABLE consultation ADD frequence_cardiaque VARCHAR(255) NOT NULL, ADD taux_oxygene VARCHAR(255) NOT NULL, DROP frequence_cardiauqe, CHANGE temperature temperature VARCHAR(255) NOT NULL, CHANGE pression_arterielle pression_arterielle VARCHAR(255) NOT NULL, CHANGE dete_deconsultation date DATE NOT NULL');
        $this->addSql('DROP INDEX UNIQ_1BDA53C6E7927C74 ON medecin');
        $this->addSql('ALTER TABLE medecin DROP roles, DROP adresse, CHANGE email email VARCHAR(255) NOT NULL, CHANGE prenom prenom VARCHAR(255) NOT NULL, CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE telephone telephone VARCHAR(255) NOT NULL, CHANGE date_naissance date_naissance DATE NOT NULL, CHANGE password pasword VARCHAR(255) NOT NULL');
        $this->addSql('DROP INDEX UNIQ_1ADAD7EBE7927C74 ON patient');
        $this->addSql('ALTER TABLE patient ADD medecin_id INT DEFAULT NULL, ADD ages INT NOT NULL, ADD qr_code VARCHAR(255) NOT NULL, DROP email, DROP roles, DROP password, DROP age, DROP qrcode, CHANGE prenom prenom VARCHAR(255) NOT NULL, CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE adresse adresse VARCHAR(255) NOT NULL, CHANGE telephone telephone VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EB4F31A84 FOREIGN KEY (medecin_id) REFERENCES medecin (id)');
        $this->addSql('CREATE INDEX IDX_1ADAD7EB4F31A84 ON patient (medecin_id)');
        $this->addSql('ALTER TABLE proche DROP FOREIGN KEY FK_80DAF9996B899279');
        $this->addSql('DROP INDEX IDX_80DAF9996B899279 ON proche');
        $this->addSql('DROP INDEX UNIQ_80DAF999E7927C74 ON proche');
        $this->addSql('ALTER TABLE proche DROP patient_id, DROP roles, DROP password, CHANGE email email VARCHAR(255) NOT NULL, CHANGE prenom prenom VARCHAR(255) NOT NULL, CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE adresse adresse VARCHAR(255) NOT NULL, CHANGE telephone telephone VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE maladie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE patient_maladie (patient_id INT NOT NULL, maladie_id INT NOT NULL, INDEX IDX_F0A757A06B899279 (patient_id), INDEX IDX_F0A757A0B4B1C397 (maladie_id), PRIMARY KEY(patient_id, maladie_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE patient_medecin (patient_id INT NOT NULL, medecin_id INT NOT NULL, INDEX IDX_46B9062D6B899279 (patient_id), INDEX IDX_46B9062D4F31A84 (medecin_id), PRIMARY KEY(patient_id, medecin_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, roles JSON DEFAULT NULL, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, nom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, adresse VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, telephone VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE patient_maladie ADD CONSTRAINT FK_F0A757A06B899279 FOREIGN KEY (patient_id) REFERENCES patient (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE patient_maladie ADD CONSTRAINT FK_F0A757A0B4B1C397 FOREIGN KEY (maladie_id) REFERENCES maladie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE patient_medecin ADD CONSTRAINT FK_46B9062D4F31A84 FOREIGN KEY (medecin_id) REFERENCES medecin (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE patient_medecin ADD CONSTRAINT FK_46B9062D6B899279 FOREIGN KEY (patient_id) REFERENCES patient (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE patient_proche');
        $this->addSql('ALTER TABLE conseil DROP FOREIGN KEY FK_3F3F068162FF6CDF');
        $this->addSql('DROP INDEX UNIQ_3F3F068162FF6CDF ON conseil');
        $this->addSql('ALTER TABLE conseil CHANGE contenu contenu VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE consultation_id medecin_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE conseil ADD CONSTRAINT FK_3F3F06814F31A84 FOREIGN KEY (medecin_id) REFERENCES medecin (id)');
        $this->addSql('CREATE INDEX IDX_3F3F06814F31A84 ON conseil (medecin_id)');
        $this->addSql('ALTER TABLE consultation ADD frequence_cardiauqe VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, DROP frequence_cardiaque, DROP taux_oxygene, CHANGE temperature temperature VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE pression_arterielle pression_arterielle VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE date dete_deconsultation DATE NOT NULL');
        $this->addSql('ALTER TABLE medecin ADD roles JSON DEFAULT NULL, ADD adresse VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom nom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE date_naissance date_naissance DATE DEFAULT NULL, CHANGE email email VARCHAR(180) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE telephone telephone VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE pasword password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1BDA53C6E7927C74 ON medecin (email)');
        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EB4F31A84');
        $this->addSql('DROP INDEX IDX_1ADAD7EB4F31A84 ON patient');
        $this->addSql('ALTER TABLE patient ADD email VARCHAR(180) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD roles JSON DEFAULT NULL, ADD age VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD qrcode VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, DROP medecin_id, DROP ages, CHANGE nom nom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE telephone telephone VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse adresse VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE qr_code password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1ADAD7EBE7927C74 ON patient (email)');
        $this->addSql('ALTER TABLE proche ADD patient_id INT DEFAULT NULL, ADD roles JSON DEFAULT NULL, ADD password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom nom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(180) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE telephone telephone VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse adresse VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE proche ADD CONSTRAINT FK_80DAF9996B899279 FOREIGN KEY (patient_id) REFERENCES proche (id)');
        $this->addSql('CREATE INDEX IDX_80DAF9996B899279 ON proche (patient_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_80DAF999E7927C74 ON proche (email)');
    }
}
