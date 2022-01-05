<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220105210806 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE character (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, weapon_id INTEGER DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, img CLOB DEFAULT NULL, atk INTEGER DEFAULT NULL, def INTEGER DEFAULT NULL, hp INTEGER DEFAULT NULL, er DOUBLE PRECISION DEFAULT NULL, em INTEGER DEFAULT NULL, cr DOUBLE PRECISION DEFAULT NULL, cd DOUBLE PRECISION DEFAULT NULL, ed DOUBLE PRECISION DEFAULT NULL, talent_e INTEGER DEFAULT NULL, talent_q INTEGER DEFAULT NULL, talent_aa INTEGER DEFAULT NULL, video_url CLOB DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_937AB03495B82273 ON character (weapon_id)');
        $this->addSql('CREATE TABLE team (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, weapon_id INTEGER DEFAULT NULL, character_id INTEGER DEFAULT NULL, atk INTEGER DEFAULT NULL, def INTEGER DEFAULT NULL, hp INTEGER DEFAULT NULL, er DOUBLE PRECISION DEFAULT NULL, em INTEGER DEFAULT NULL, cr DOUBLE PRECISION DEFAULT NULL, cd DOUBLE PRECISION DEFAULT NULL, ed DOUBLE PRECISION DEFAULT NULL, talent_e INTEGER DEFAULT NULL, talent_q INTEGER DEFAULT NULL, talent_aa INTEGER DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_C4E0A61F95B82273 ON team (weapon_id)');
        $this->addSql('CREATE INDEX IDX_C4E0A61F1136BE75 ON team (character_id)');
        $this->addSql('CREATE TABLE weapon (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, img CLOB DEFAULT NULL)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE character');
        $this->addSql('DROP TABLE team');
        $this->addSql('DROP TABLE weapon');
    }
}
