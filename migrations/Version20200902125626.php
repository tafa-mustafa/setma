<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200902125626 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE conseil (id INT AUTO_INCREMENT NOT NULL, contenu VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE consultation (id INT AUTO_INCREMENT NOT NULL, patient_id INT DEFAULT NULL, conseil_id INT DEFAULT NULL, date VARCHAR(255) NOT NULL, temperature VARCHAR(255) NOT NULL, frequence_cardiaque VARCHAR(255) NOT NULL, presion_artelielle VARCHAR(255) NOT NULL, taux_oxygene VARCHAR(255) NOT NULL, INDEX IDX_964685A66B899279 (patient_id), UNIQUE INDEX UNIQ_964685A6668A3E03 (conseil_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medecin (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, date_naissance VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, specialite VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1BDA53C6E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patient (id INT AUTO_INCREMENT NOT NULL, medecin_id INT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, date_naissance VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, qr_code VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1ADAD7EBE7927C74 (email), INDEX IDX_1ADAD7EB4F31A84 (medecin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patient_proche (patient_id INT NOT NULL, proche_id INT NOT NULL, INDEX IDX_8B9410636B899279 (patient_id), INDEX IDX_8B94106337FB27F1 (proche_id), PRIMARY KEY(patient_id, proche_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proche (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, date_naissance VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A66B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE consultation ADD CONSTRAINT FK_964685A6668A3E03 FOREIGN KEY (conseil_id) REFERENCES conseil (id)');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EB4F31A84 FOREIGN KEY (medecin_id) REFERENCES medecin (id)');
        $this->addSql('ALTER TABLE patient_proche ADD CONSTRAINT FK_8B9410636B899279 FOREIGN KEY (patient_id) REFERENCES patient (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE patient_proche ADD CONSTRAINT FK_8B94106337FB27F1 FOREIGN KEY (proche_id) REFERENCES proche (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A6668A3E03');
        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EB4F31A84');
        $this->addSql('ALTER TABLE consultation DROP FOREIGN KEY FK_964685A66B899279');
        $this->addSql('ALTER TABLE patient_proche DROP FOREIGN KEY FK_8B9410636B899279');
        $this->addSql('ALTER TABLE patient_proche DROP FOREIGN KEY FK_8B94106337FB27F1');
        $this->addSql('DROP TABLE conseil');
        $this->addSql('DROP TABLE consultation');
        $this->addSql('DROP TABLE medecin');
        $this->addSql('DROP TABLE patient');
        $this->addSql('DROP TABLE patient_proche');
        $this->addSql('DROP TABLE proche');
        $this->addSql('DROP TABLE user');
    }
}
