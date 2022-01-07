<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220107172120 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE character_artifact');
        $this->addSql('DROP TABLE character_buff');
        $this->addSql('DROP TABLE team_artifact');
        $this->addSql('ALTER TABLE `character` ADD buff LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', ADD artifact LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE team ADD artifact LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE character_artifact (character_id INT NOT NULL, artifact_id INT NOT NULL, INDEX IDX_10E489BD1136BE75 (character_id), INDEX IDX_10E489BDE28B07AC (artifact_id), PRIMARY KEY(character_id, artifact_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE character_buff (character_id INT NOT NULL, buff_id INT NOT NULL, INDEX IDX_62DB56FB1136BE75 (character_id), INDEX IDX_62DB56FB4B9528D0 (buff_id), PRIMARY KEY(character_id, buff_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE team_artifact (team_id INT NOT NULL, artifact_id INT NOT NULL, INDEX IDX_F0A7BC52296CD8AE (team_id), INDEX IDX_F0A7BC52E28B07AC (artifact_id), PRIMARY KEY(team_id, artifact_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE character_artifact ADD CONSTRAINT FK_10E489BD1136BE75 FOREIGN KEY (character_id) REFERENCES `character` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE character_artifact ADD CONSTRAINT FK_10E489BDE28B07AC FOREIGN KEY (artifact_id) REFERENCES artifact (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE character_buff ADD CONSTRAINT FK_62DB56FB1136BE75 FOREIGN KEY (character_id) REFERENCES `character` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE character_buff ADD CONSTRAINT FK_62DB56FB4B9528D0 FOREIGN KEY (buff_id) REFERENCES buff (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE team_artifact ADD CONSTRAINT FK_F0A7BC52296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE team_artifact ADD CONSTRAINT FK_F0A7BC52E28B07AC FOREIGN KEY (artifact_id) REFERENCES artifact (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE `character` DROP buff, DROP artifact');
        $this->addSql('ALTER TABLE team DROP artifact');
    }
}
