<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220106193640 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artifact (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, img LONGTEXT DEFAULT NULL, halfset VARCHAR(255) DEFAULT NULL, fullset VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE buff (id INT AUTO_INCREMENT NOT NULL, img LONGTEXT DEFAULT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE character_artifact (character_id INT NOT NULL, artifact_id INT NOT NULL, INDEX IDX_10E489BD1136BE75 (character_id), INDEX IDX_10E489BDE28B07AC (artifact_id), PRIMARY KEY(character_id, artifact_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE character_buff (character_id INT NOT NULL, buff_id INT NOT NULL, INDEX IDX_62DB56FB1136BE75 (character_id), INDEX IDX_62DB56FB4B9528D0 (buff_id), PRIMARY KEY(character_id, buff_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE element (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, img LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team_artifact (team_id INT NOT NULL, artifact_id INT NOT NULL, INDEX IDX_F0A7BC52296CD8AE (team_id), INDEX IDX_F0A7BC52E28B07AC (artifact_id), PRIMARY KEY(team_id, artifact_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE character_artifact ADD CONSTRAINT FK_10E489BD1136BE75 FOREIGN KEY (character_id) REFERENCES `character` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE character_artifact ADD CONSTRAINT FK_10E489BDE28B07AC FOREIGN KEY (artifact_id) REFERENCES artifact (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE character_buff ADD CONSTRAINT FK_62DB56FB1136BE75 FOREIGN KEY (character_id) REFERENCES `character` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE character_buff ADD CONSTRAINT FK_62DB56FB4B9528D0 FOREIGN KEY (buff_id) REFERENCES buff (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE team_artifact ADD CONSTRAINT FK_F0A7BC52296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE team_artifact ADD CONSTRAINT FK_F0A7BC52E28B07AC FOREIGN KEY (artifact_id) REFERENCES artifact (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE `character` ADD element_id INT DEFAULT NULL, ADD banner LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB0341F1F2A24 FOREIGN KEY (element_id) REFERENCES element (id)');
        $this->addSql('CREATE INDEX IDX_937AB0341F1F2A24 ON `character` (element_id)');
        $this->addSql('ALTER TABLE team ADD element_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F1F1F2A24 FOREIGN KEY (element_id) REFERENCES element (id)');
        $this->addSql('CREATE INDEX IDX_C4E0A61F1F1F2A24 ON team (element_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE character_artifact DROP FOREIGN KEY FK_10E489BDE28B07AC');
        $this->addSql('ALTER TABLE team_artifact DROP FOREIGN KEY FK_F0A7BC52E28B07AC');
        $this->addSql('ALTER TABLE character_buff DROP FOREIGN KEY FK_62DB56FB4B9528D0');
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB0341F1F2A24');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61F1F1F2A24');
        $this->addSql('DROP TABLE artifact');
        $this->addSql('DROP TABLE buff');
        $this->addSql('DROP TABLE character_artifact');
        $this->addSql('DROP TABLE character_buff');
        $this->addSql('DROP TABLE element');
        $this->addSql('DROP TABLE team_artifact');
        $this->addSql('DROP INDEX IDX_937AB0341F1F2A24 ON `character`');
        $this->addSql('ALTER TABLE `character` DROP element_id, DROP banner');
        $this->addSql('DROP INDEX IDX_C4E0A61F1F1F2A24 ON team');
        $this->addSql('ALTER TABLE team DROP element_id');
    }
}
