<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220225203157 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_7527426358BA8670');
        $this->addSql('DROP INDEX IDX_7527426395B82273');
        $this->addSql('DROP INDEX IDX_752742631136BE75');
        $this->addSql('CREATE TEMPORARY TABLE __temp__buff AS SELECT id, character_id, weapon_id, aritfact_id, img, description FROM buff');
        $this->addSql('DROP TABLE buff');
        $this->addSql('CREATE TABLE buff (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, character_id INTEGER DEFAULT NULL, weapon_id INTEGER DEFAULT NULL, aritfact_id INTEGER DEFAULT NULL, img CLOB DEFAULT NULL COLLATE BINARY, description CLOB DEFAULT NULL COLLATE BINARY, CONSTRAINT FK_752742631136BE75 FOREIGN KEY (character_id) REFERENCES character (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_7527426395B82273 FOREIGN KEY (weapon_id) REFERENCES weapon (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_7527426358BA8670 FOREIGN KEY (aritfact_id) REFERENCES artifact (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO buff (id, character_id, weapon_id, aritfact_id, img, description) SELECT id, character_id, weapon_id, aritfact_id, img, description FROM __temp__buff');
        $this->addSql('DROP TABLE __temp__buff');
        $this->addSql('CREATE INDEX IDX_7527426358BA8670 ON buff (aritfact_id)');
        $this->addSql('CREATE INDEX IDX_7527426395B82273 ON buff (weapon_id)');
        $this->addSql('CREATE INDEX IDX_752742631136BE75 ON buff (character_id)');
        $this->addSql('DROP INDEX IDX_937AB0341F1F2A24');
        $this->addSql('DROP INDEX IDX_937AB03495B82273');
        $this->addSql('CREATE TEMPORARY TABLE __temp__character AS SELECT id, weapon_id, element_id, name, atk, def, hp, er, em, cr, cd, ed, talent_e, talent_q, talent_aa, video_url, weapon_refine, rarity, buff, nation, aaimg, talent_eimg, talent_qimg, cons FROM character');
        $this->addSql('DROP TABLE character');
        $this->addSql('CREATE TABLE character (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, weapon_id INTEGER DEFAULT NULL, element_id INTEGER DEFAULT NULL, name VARCHAR(255) DEFAULT NULL COLLATE BINARY, atk INTEGER DEFAULT NULL, def INTEGER DEFAULT NULL, hp INTEGER DEFAULT NULL, er DOUBLE PRECISION DEFAULT NULL, em INTEGER DEFAULT NULL, cr DOUBLE PRECISION DEFAULT NULL, cd DOUBLE PRECISION DEFAULT NULL, ed DOUBLE PRECISION DEFAULT NULL, talent_e INTEGER DEFAULT NULL, talent_q INTEGER DEFAULT NULL, talent_aa INTEGER DEFAULT NULL, video_url CLOB DEFAULT NULL COLLATE BINARY, weapon_refine VARCHAR(255) DEFAULT NULL COLLATE BINARY, rarity INTEGER DEFAULT NULL, buff CLOB DEFAULT NULL COLLATE BINARY --(DC2Type:array)
        , nation VARCHAR(255) DEFAULT NULL COLLATE BINARY, aaimg CLOB DEFAULT NULL COLLATE BINARY, talent_eimg CLOB DEFAULT NULL COLLATE BINARY, talent_qimg CLOB DEFAULT NULL COLLATE BINARY, cons INTEGER DEFAULT NULL, artifact CLOB DEFAULT NULL --(DC2Type:array)
        , CONSTRAINT FK_937AB03495B82273 FOREIGN KEY (weapon_id) REFERENCES weapon (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_937AB0341F1F2A24 FOREIGN KEY (element_id) REFERENCES element (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO character (id, weapon_id, element_id, name, atk, def, hp, er, em, cr, cd, ed, talent_e, talent_q, talent_aa, video_url, weapon_refine, rarity, buff, nation, aaimg, talent_eimg, talent_qimg, cons) SELECT id, weapon_id, element_id, name, atk, def, hp, er, em, cr, cd, ed, talent_e, talent_q, talent_aa, video_url, weapon_refine, rarity, buff, nation, aaimg, talent_eimg, talent_qimg, cons FROM __temp__character');
        $this->addSql('DROP TABLE __temp__character');
        $this->addSql('CREATE INDEX IDX_937AB0341F1F2A24 ON character (element_id)');
        $this->addSql('CREATE INDEX IDX_937AB03495B82273 ON character (weapon_id)');
        $this->addSql('DROP INDEX IDX_3FC1ECB5C70F0E28');
        $this->addSql('CREATE TEMPORARY TABLE __temp__patch_char AS SELECT id, characters_id, title, description FROM patch_char');
        $this->addSql('DROP TABLE patch_char');
        $this->addSql('CREATE TABLE patch_char (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, characters_id INTEGER DEFAULT NULL, title VARCHAR(255) DEFAULT NULL COLLATE BINARY, description VARCHAR(255) DEFAULT NULL COLLATE BINARY, CONSTRAINT FK_3FC1ECB5C70F0E28 FOREIGN KEY (characters_id) REFERENCES character (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO patch_char (id, characters_id, title, description) SELECT id, characters_id, title, description FROM __temp__patch_char');
        $this->addSql('DROP TABLE __temp__patch_char');
        $this->addSql('CREATE INDEX IDX_3FC1ECB5C70F0E28 ON patch_char (characters_id)');
        $this->addSql('DROP INDEX IDX_C4E0A61F1F1F2A24');
        $this->addSql('DROP INDEX IDX_C4E0A61F1136BE75');
        $this->addSql('DROP INDEX IDX_C4E0A61F95B82273');
        $this->addSql('CREATE TEMPORARY TABLE __temp__team AS SELECT id, weapon_id, character_id, element_id, atk, def, hp, er, em, cr, cd, ed, talent_e, talent_q, talent_aa, artifact, name, aaimg, talent_eimg, talent_qimg, cons FROM team');
        $this->addSql('DROP TABLE team');
        $this->addSql('CREATE TABLE team (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, weapon_id INTEGER DEFAULT NULL, character_id INTEGER DEFAULT NULL, element_id INTEGER DEFAULT NULL, atk INTEGER DEFAULT NULL, def INTEGER DEFAULT NULL, hp INTEGER DEFAULT NULL, er DOUBLE PRECISION DEFAULT NULL, em INTEGER DEFAULT NULL, cr DOUBLE PRECISION DEFAULT NULL, cd DOUBLE PRECISION DEFAULT NULL, ed DOUBLE PRECISION DEFAULT NULL, talent_e INTEGER DEFAULT NULL, talent_q INTEGER DEFAULT NULL, talent_aa INTEGER DEFAULT NULL, artifact CLOB DEFAULT NULL COLLATE BINARY --(DC2Type:array)
        , name VARCHAR(255) DEFAULT NULL COLLATE BINARY, aaimg CLOB DEFAULT NULL COLLATE BINARY, talent_eimg CLOB DEFAULT NULL COLLATE BINARY, talent_qimg CLOB DEFAULT NULL COLLATE BINARY, cons INTEGER DEFAULT NULL, CONSTRAINT FK_C4E0A61F95B82273 FOREIGN KEY (weapon_id) REFERENCES weapon (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_C4E0A61F1136BE75 FOREIGN KEY (character_id) REFERENCES character (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_C4E0A61F1F1F2A24 FOREIGN KEY (element_id) REFERENCES element (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO team (id, weapon_id, character_id, element_id, atk, def, hp, er, em, cr, cd, ed, talent_e, talent_q, talent_aa, artifact, name, aaimg, talent_eimg, talent_qimg, cons) SELECT id, weapon_id, character_id, element_id, atk, def, hp, er, em, cr, cd, ed, talent_e, talent_q, talent_aa, artifact, name, aaimg, talent_eimg, talent_qimg, cons FROM __temp__team');
        $this->addSql('DROP TABLE __temp__team');
        $this->addSql('CREATE INDEX IDX_C4E0A61F1F1F2A24 ON team (element_id)');
        $this->addSql('CREATE INDEX IDX_C4E0A61F1136BE75 ON team (character_id)');
        $this->addSql('CREATE INDEX IDX_C4E0A61F95B82273 ON team (weapon_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_752742631136BE75');
        $this->addSql('DROP INDEX IDX_7527426395B82273');
        $this->addSql('DROP INDEX IDX_7527426358BA8670');
        $this->addSql('CREATE TEMPORARY TABLE __temp__buff AS SELECT id, character_id, weapon_id, aritfact_id, img, description FROM buff');
        $this->addSql('DROP TABLE buff');
        $this->addSql('CREATE TABLE buff (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, character_id INTEGER DEFAULT NULL, weapon_id INTEGER DEFAULT NULL, aritfact_id INTEGER DEFAULT NULL, img CLOB DEFAULT NULL, description CLOB DEFAULT NULL)');
        $this->addSql('INSERT INTO buff (id, character_id, weapon_id, aritfact_id, img, description) SELECT id, character_id, weapon_id, aritfact_id, img, description FROM __temp__buff');
        $this->addSql('DROP TABLE __temp__buff');
        $this->addSql('CREATE INDEX IDX_752742631136BE75 ON buff (character_id)');
        $this->addSql('CREATE INDEX IDX_7527426395B82273 ON buff (weapon_id)');
        $this->addSql('CREATE INDEX IDX_7527426358BA8670 ON buff (aritfact_id)');
        $this->addSql('DROP INDEX IDX_937AB03495B82273');
        $this->addSql('DROP INDEX IDX_937AB0341F1F2A24');
        $this->addSql('CREATE TEMPORARY TABLE __temp__character AS SELECT id, weapon_id, element_id, name, atk, def, hp, er, em, cr, cd, ed, talent_e, talent_q, talent_aa, video_url, weapon_refine, rarity, buff, nation, aaimg, talent_eimg, talent_qimg, cons FROM character');
        $this->addSql('DROP TABLE character');
        $this->addSql('CREATE TABLE character (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, weapon_id INTEGER DEFAULT NULL, element_id INTEGER DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, atk INTEGER DEFAULT NULL, def INTEGER DEFAULT NULL, hp INTEGER DEFAULT NULL, er DOUBLE PRECISION DEFAULT NULL, em INTEGER DEFAULT NULL, cr DOUBLE PRECISION DEFAULT NULL, cd DOUBLE PRECISION DEFAULT NULL, ed DOUBLE PRECISION DEFAULT NULL, talent_e INTEGER DEFAULT NULL, talent_q INTEGER DEFAULT NULL, talent_aa INTEGER DEFAULT NULL, video_url CLOB DEFAULT NULL, weapon_refine VARCHAR(255) DEFAULT NULL, rarity INTEGER DEFAULT NULL, buff CLOB DEFAULT NULL --(DC2Type:array)
        , nation VARCHAR(255) DEFAULT NULL, aaimg CLOB DEFAULT NULL, talent_eimg CLOB DEFAULT NULL, talent_qimg CLOB DEFAULT NULL, cons INTEGER DEFAULT NULL)');
        $this->addSql('INSERT INTO character (id, weapon_id, element_id, name, atk, def, hp, er, em, cr, cd, ed, talent_e, talent_q, talent_aa, video_url, weapon_refine, rarity, buff, nation, aaimg, talent_eimg, talent_qimg, cons) SELECT id, weapon_id, element_id, name, atk, def, hp, er, em, cr, cd, ed, talent_e, talent_q, talent_aa, video_url, weapon_refine, rarity, buff, nation, aaimg, talent_eimg, talent_qimg, cons FROM __temp__character');
        $this->addSql('DROP TABLE __temp__character');
        $this->addSql('CREATE INDEX IDX_937AB03495B82273 ON character (weapon_id)');
        $this->addSql('CREATE INDEX IDX_937AB0341F1F2A24 ON character (element_id)');
        $this->addSql('DROP INDEX IDX_3FC1ECB5C70F0E28');
        $this->addSql('CREATE TEMPORARY TABLE __temp__patch_char AS SELECT id, characters_id, title, description FROM patch_char');
        $this->addSql('DROP TABLE patch_char');
        $this->addSql('CREATE TABLE patch_char (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, characters_id INTEGER DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO patch_char (id, characters_id, title, description) SELECT id, characters_id, title, description FROM __temp__patch_char');
        $this->addSql('DROP TABLE __temp__patch_char');
        $this->addSql('CREATE INDEX IDX_3FC1ECB5C70F0E28 ON patch_char (characters_id)');
        $this->addSql('DROP INDEX IDX_C4E0A61F95B82273');
        $this->addSql('DROP INDEX IDX_C4E0A61F1136BE75');
        $this->addSql('DROP INDEX IDX_C4E0A61F1F1F2A24');
        $this->addSql('CREATE TEMPORARY TABLE __temp__team AS SELECT id, weapon_id, character_id, element_id, atk, def, hp, er, em, cr, cd, ed, talent_e, talent_q, talent_aa, artifact, name, aaimg, talent_eimg, talent_qimg, cons FROM team');
        $this->addSql('DROP TABLE team');
        $this->addSql('CREATE TABLE team (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, weapon_id INTEGER DEFAULT NULL, character_id INTEGER DEFAULT NULL, element_id INTEGER DEFAULT NULL, atk INTEGER DEFAULT NULL, def INTEGER DEFAULT NULL, hp INTEGER DEFAULT NULL, er DOUBLE PRECISION DEFAULT NULL, em INTEGER DEFAULT NULL, cr DOUBLE PRECISION DEFAULT NULL, cd DOUBLE PRECISION DEFAULT NULL, ed DOUBLE PRECISION DEFAULT NULL, talent_e INTEGER DEFAULT NULL, talent_q INTEGER DEFAULT NULL, talent_aa INTEGER DEFAULT NULL, artifact CLOB DEFAULT NULL --(DC2Type:array)
        , name VARCHAR(255) DEFAULT NULL, aaimg CLOB DEFAULT NULL, talent_eimg CLOB DEFAULT NULL, talent_qimg CLOB DEFAULT NULL, cons INTEGER DEFAULT NULL)');
        $this->addSql('INSERT INTO team (id, weapon_id, character_id, element_id, atk, def, hp, er, em, cr, cd, ed, talent_e, talent_q, talent_aa, artifact, name, aaimg, talent_eimg, talent_qimg, cons) SELECT id, weapon_id, character_id, element_id, atk, def, hp, er, em, cr, cd, ed, talent_e, talent_q, talent_aa, artifact, name, aaimg, talent_eimg, talent_qimg, cons FROM __temp__team');
        $this->addSql('DROP TABLE __temp__team');
        $this->addSql('CREATE INDEX IDX_C4E0A61F95B82273 ON team (weapon_id)');
        $this->addSql('CREATE INDEX IDX_C4E0A61F1136BE75 ON team (character_id)');
        $this->addSql('CREATE INDEX IDX_C4E0A61F1F1F2A24 ON team (element_id)');
    }
}
