<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211110100224 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE abonnement (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, duree INT NOT NULL, montant INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE championnat (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipe (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipe_matchs (id INT AUTO_INCREMENT NOT NULL, matchs_id INT NOT NULL, equipe_id INT NOT NULL, INDEX IDX_662906E988EB7468 (matchs_id), INDEX IDX_662906E96D861B89 (equipe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `like` (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT NOT NULL, valeur TINYINT(1) NOT NULL, INDEX IDX_AC6340B3FB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matchs (id INT AUTO_INCREMENT NOT NULL, championnat_id INT NOT NULL, date DATETIME NOT NULL, INDEX IDX_6B1E6041627A0DA8 (championnat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE point_cle (id INT AUTO_INCREMENT NOT NULL, prono_id INT NOT NULL, valeur VARCHAR(255) NOT NULL, INDEX IDX_128C9F8E9760002F (prono_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prono (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, matchs_id INT NOT NULL, code_coupon VARCHAR(255) NOT NULL, valeur VARCHAR(255) NOT NULL, statut VARCHAR(255) NOT NULL, commentaire VARCHAR(255) NOT NULL, etat VARCHAR(255) NOT NULL, point VARCHAR(255) NOT NULL, supprime TINYINT(1) NOT NULL, date_de_creation DATETIME NOT NULL, date_de_modification DATETIME DEFAULT NULL, INDEX IDX_9B3EC938FB88E14F (utilisateur_id), INDEX IDX_9B3EC93888EB7468 (matchs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prono_live (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT NOT NULL, code_coupon VARCHAR(255) NOT NULL, commentaire LONGTEXT NOT NULL, statut VARCHAR(255) NOT NULL, INDEX IDX_287E9534FB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roles JSON NOT NULL, point INT DEFAULT NULL, UNIQUE INDEX UNIQ_1D1C63B3E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE validite (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, abonnement_id INT NOT NULL, date_debut DATETIME NOT NULL, INDEX IDX_4C0163ECFB88E14F (utilisateur_id), INDEX IDX_4C0163ECF1D74413 (abonnement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE equipe_matchs ADD CONSTRAINT FK_662906E988EB7468 FOREIGN KEY (matchs_id) REFERENCES matchs (id)');
        $this->addSql('ALTER TABLE equipe_matchs ADD CONSTRAINT FK_662906E96D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE `like` ADD CONSTRAINT FK_AC6340B3FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE matchs ADD CONSTRAINT FK_6B1E6041627A0DA8 FOREIGN KEY (championnat_id) REFERENCES championnat (id)');
        $this->addSql('ALTER TABLE point_cle ADD CONSTRAINT FK_128C9F8E9760002F FOREIGN KEY (prono_id) REFERENCES prono (id)');
        $this->addSql('ALTER TABLE prono ADD CONSTRAINT FK_9B3EC938FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE prono ADD CONSTRAINT FK_9B3EC93888EB7468 FOREIGN KEY (matchs_id) REFERENCES matchs (id)');
        $this->addSql('ALTER TABLE prono_live ADD CONSTRAINT FK_287E9534FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE validite ADD CONSTRAINT FK_4C0163ECFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE validite ADD CONSTRAINT FK_4C0163ECF1D74413 FOREIGN KEY (abonnement_id) REFERENCES abonnement (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE validite DROP FOREIGN KEY FK_4C0163ECF1D74413');
        $this->addSql('ALTER TABLE matchs DROP FOREIGN KEY FK_6B1E6041627A0DA8');
        $this->addSql('ALTER TABLE equipe_matchs DROP FOREIGN KEY FK_662906E96D861B89');
        $this->addSql('ALTER TABLE equipe_matchs DROP FOREIGN KEY FK_662906E988EB7468');
        $this->addSql('ALTER TABLE prono DROP FOREIGN KEY FK_9B3EC93888EB7468');
        $this->addSql('ALTER TABLE point_cle DROP FOREIGN KEY FK_128C9F8E9760002F');
        $this->addSql('ALTER TABLE `like` DROP FOREIGN KEY FK_AC6340B3FB88E14F');
        $this->addSql('ALTER TABLE prono DROP FOREIGN KEY FK_9B3EC938FB88E14F');
        $this->addSql('ALTER TABLE prono_live DROP FOREIGN KEY FK_287E9534FB88E14F');
        $this->addSql('ALTER TABLE validite DROP FOREIGN KEY FK_4C0163ECFB88E14F');
        $this->addSql('DROP TABLE abonnement');
        $this->addSql('DROP TABLE championnat');
        $this->addSql('DROP TABLE equipe');
        $this->addSql('DROP TABLE equipe_matchs');
        $this->addSql('DROP TABLE `like`');
        $this->addSql('DROP TABLE matchs');
        $this->addSql('DROP TABLE point_cle');
        $this->addSql('DROP TABLE prono');
        $this->addSql('DROP TABLE prono_live');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE validite');
    }
}
