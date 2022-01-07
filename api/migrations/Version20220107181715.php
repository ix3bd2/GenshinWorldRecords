<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220107181715 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artifact (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, img LONGTEXT DEFAULT NULL, halfset VARCHAR(255) DEFAULT NULL, fullset LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE buff (id INT AUTO_INCREMENT NOT NULL, img LONGTEXT DEFAULT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `character` (id INT AUTO_INCREMENT NOT NULL, weapon_id INT DEFAULT NULL, element_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, img LONGTEXT DEFAULT NULL, atk INT DEFAULT NULL, def INT DEFAULT NULL, hp INT DEFAULT NULL, er DOUBLE PRECISION DEFAULT NULL, em INT DEFAULT NULL, cr DOUBLE PRECISION DEFAULT NULL, cd DOUBLE PRECISION DEFAULT NULL, ed DOUBLE PRECISION DEFAULT NULL, talent_e INT DEFAULT NULL, talent_q INT DEFAULT NULL, talent_aa INT DEFAULT NULL, video_url LONGTEXT DEFAULT NULL, banner LONGTEXT DEFAULT NULL, weapon_refine VARCHAR(255) DEFAULT NULL, banner_bg LONGTEXT DEFAULT NULL, rarity INT DEFAULT NULL, buff LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', artifact LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', INDEX IDX_937AB03495B82273 (weapon_id), INDEX IDX_937AB0341F1F2A24 (element_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE element (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, img LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team (id INT AUTO_INCREMENT NOT NULL, weapon_id INT DEFAULT NULL, character_id INT DEFAULT NULL, element_id INT DEFAULT NULL, atk INT DEFAULT NULL, def INT DEFAULT NULL, hp INT DEFAULT NULL, er DOUBLE PRECISION DEFAULT NULL, em INT DEFAULT NULL, cr DOUBLE PRECISION DEFAULT NULL, cd DOUBLE PRECISION DEFAULT NULL, ed DOUBLE PRECISION DEFAULT NULL, talent_e INT DEFAULT NULL, talent_q INT DEFAULT NULL, talent_aa INT DEFAULT NULL, artifact LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', INDEX IDX_C4E0A61F95B82273 (weapon_id), INDEX IDX_C4E0A61F1136BE75 (character_id), INDEX IDX_C4E0A61F1F1F2A24 (element_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE weapon (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, img LONGTEXT DEFAULT NULL, rarity INT DEFAULT NULL, atk INT DEFAULT NULL, substate VARCHAR(255) DEFAULT NULL, passive LONGTEXT DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB03495B82273 FOREIGN KEY (weapon_id) REFERENCES weapon (id)');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB0341F1F2A24 FOREIGN KEY (element_id) REFERENCES element (id)');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F95B82273 FOREIGN KEY (weapon_id) REFERENCES weapon (id)');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F1136BE75 FOREIGN KEY (character_id) REFERENCES `character` (id)');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F1F1F2A24 FOREIGN KEY (element_id) REFERENCES element (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61F1136BE75');
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB0341F1F2A24');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61F1F1F2A24');
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB03495B82273');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61F95B82273');
        $this->addSql('DROP TABLE artifact');
        $this->addSql('DROP TABLE buff');
        $this->addSql('DROP TABLE `character`');
        $this->addSql('DROP TABLE element');
        $this->addSql('DROP TABLE team');
        $this->addSql('DROP TABLE weapon');
    }
}
