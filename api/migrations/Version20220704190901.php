<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220704190901 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE spiral_abyss_teams (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, weapon_id INTEGER DEFAULT NULL, character_id INTEGER DEFAULT NULL, top3_spiral_abyss_id INTEGER DEFAULT NULL, atk INTEGER DEFAULT NULL, def INTEGER DEFAULT NULL, hp INTEGER DEFAULT NULL, er DOUBLE PRECISION DEFAULT NULL, em INTEGER DEFAULT NULL, cr DOUBLE PRECISION DEFAULT NULL, cd DOUBLE PRECISION DEFAULT NULL, ed DOUBLE PRECISION DEFAULT NULL, talent_e INTEGER DEFAULT NULL, talent_q INTEGER DEFAULT NULL, talent_aa INTEGER DEFAULT NULL, cons INTEGER DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_EBFAB36E95B82273 ON spiral_abyss_teams (weapon_id)');
        $this->addSql('CREATE INDEX IDX_EBFAB36E1136BE75 ON spiral_abyss_teams (character_id)');
        $this->addSql('CREATE INDEX IDX_EBFAB36E7AD42B48 ON spiral_abyss_teams (top3_spiral_abyss_id)');
        $this->addSql('CREATE TABLE spiral_abyss_teams_artifact (spiral_abyss_teams_id INTEGER NOT NULL, artifact_id INTEGER NOT NULL, PRIMARY KEY(spiral_abyss_teams_id, artifact_id))');
        $this->addSql('CREATE INDEX IDX_167020E8B688C588 ON spiral_abyss_teams_artifact (spiral_abyss_teams_id)');
        $this->addSql('CREATE INDEX IDX_167020E8E28B07AC ON spiral_abyss_teams_artifact (artifact_id)');
        $this->addSql('CREATE TABLE top3_spiral_abyss (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL)');
        $this->addSql('DROP INDEX IDX_752742631136BE75');
        $this->addSql('DROP INDEX IDX_7527426395B82273');
        $this->addSql('DROP INDEX IDX_75274263E28B07AC');
        $this->addSql('CREATE TEMPORARY TABLE __temp__buff AS SELECT id, character_id, weapon_id, artifact_id, img, description FROM buff');
        $this->addSql('DROP TABLE buff');
        $this->addSql('CREATE TABLE buff (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, character_id INTEGER DEFAULT NULL, weapon_id INTEGER DEFAULT NULL, artifact_id INTEGER DEFAULT NULL, img CLOB DEFAULT NULL, description CLOB DEFAULT NULL, CONSTRAINT FK_752742631136BE75 FOREIGN KEY (character_id) REFERENCES character (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_7527426395B82273 FOREIGN KEY (weapon_id) REFERENCES weapon (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_75274263E28B07AC FOREIGN KEY (artifact_id) REFERENCES artifact (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO buff (id, character_id, weapon_id, artifact_id, img, description) SELECT id, character_id, weapon_id, artifact_id, img, description FROM __temp__buff');
        $this->addSql('DROP TABLE __temp__buff');
        $this->addSql('CREATE INDEX IDX_752742631136BE75 ON buff (character_id)');
        $this->addSql('CREATE INDEX IDX_7527426395B82273 ON buff (weapon_id)');
        $this->addSql('CREATE INDEX IDX_75274263E28B07AC ON buff (artifact_id)');
        $this->addSql('DROP INDEX IDX_937AB03495B82273');
        $this->addSql('DROP INDEX IDX_937AB0341F1F2A24');
        $this->addSql('CREATE TEMPORARY TABLE __temp__character AS SELECT id, weapon_id, element_id, name, atk, def, hp, er, em, cr, cd, ed, talent_e, talent_q, talent_aa, video_url, weapon_refine, rarity, buff, nation, aaimg, talent_eimg, talent_qimg, cons, active, player_name, ar, abyss_clear, main_char, highest_dmg FROM character');
        $this->addSql('DROP TABLE character');
        $this->addSql('CREATE TABLE character (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, weapon_id INTEGER DEFAULT NULL, element_id INTEGER DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, atk INTEGER DEFAULT NULL, def INTEGER DEFAULT NULL, hp INTEGER DEFAULT NULL, er DOUBLE PRECISION DEFAULT NULL, em INTEGER DEFAULT NULL, cr DOUBLE PRECISION DEFAULT NULL, cd DOUBLE PRECISION DEFAULT NULL, ed DOUBLE PRECISION DEFAULT NULL, talent_e INTEGER DEFAULT NULL, talent_q INTEGER DEFAULT NULL, talent_aa INTEGER DEFAULT NULL, video_url CLOB DEFAULT NULL, weapon_refine VARCHAR(255) DEFAULT NULL, rarity INTEGER DEFAULT NULL, buff CLOB DEFAULT NULL --(DC2Type:array)
        , nation VARCHAR(255) DEFAULT NULL, aaimg CLOB DEFAULT NULL, talent_eimg CLOB DEFAULT NULL, talent_qimg CLOB DEFAULT NULL, cons INTEGER DEFAULT NULL, active INTEGER DEFAULT NULL, player_name VARCHAR(255) DEFAULT NULL, ar VARCHAR(255) DEFAULT NULL, abyss_clear VARCHAR(255) DEFAULT NULL, main_char VARCHAR(255) DEFAULT NULL, highest_dmg INTEGER DEFAULT NULL, CONSTRAINT FK_937AB03495B82273 FOREIGN KEY (weapon_id) REFERENCES weapon (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_937AB0341F1F2A24 FOREIGN KEY (element_id) REFERENCES element (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO character (id, weapon_id, element_id, name, atk, def, hp, er, em, cr, cd, ed, talent_e, talent_q, talent_aa, video_url, weapon_refine, rarity, buff, nation, aaimg, talent_eimg, talent_qimg, cons, active, player_name, ar, abyss_clear, main_char, highest_dmg) SELECT id, weapon_id, element_id, name, atk, def, hp, er, em, cr, cd, ed, talent_e, talent_q, talent_aa, video_url, weapon_refine, rarity, buff, nation, aaimg, talent_eimg, talent_qimg, cons, active, player_name, ar, abyss_clear, main_char, highest_dmg FROM __temp__character');
        $this->addSql('DROP TABLE __temp__character');
        $this->addSql('CREATE INDEX IDX_937AB03495B82273 ON character (weapon_id)');
        $this->addSql('CREATE INDEX IDX_937AB0341F1F2A24 ON character (element_id)');
        $this->addSql('DROP INDEX IDX_10E489BD1136BE75');
        $this->addSql('DROP INDEX IDX_10E489BDE28B07AC');
        $this->addSql('CREATE TEMPORARY TABLE __temp__character_artifact AS SELECT character_id, artifact_id FROM character_artifact');
        $this->addSql('DROP TABLE character_artifact');
        $this->addSql('CREATE TABLE character_artifact (character_id INTEGER NOT NULL, artifact_id INTEGER NOT NULL, PRIMARY KEY(character_id, artifact_id), CONSTRAINT FK_10E489BD1136BE75 FOREIGN KEY (character_id) REFERENCES character (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_10E489BDE28B07AC FOREIGN KEY (artifact_id) REFERENCES artifact (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO character_artifact (character_id, artifact_id) SELECT character_id, artifact_id FROM __temp__character_artifact');
        $this->addSql('DROP TABLE __temp__character_artifact');
        $this->addSql('CREATE INDEX IDX_10E489BD1136BE75 ON character_artifact (character_id)');
        $this->addSql('CREATE INDEX IDX_10E489BDE28B07AC ON character_artifact (artifact_id)');
        $this->addSql('DROP INDEX IDX_62DB56FB1136BE75');
        $this->addSql('DROP INDEX IDX_62DB56FB4B9528D0');
        $this->addSql('CREATE TEMPORARY TABLE __temp__character_buff AS SELECT character_id, buff_id FROM character_buff');
        $this->addSql('DROP TABLE character_buff');
        $this->addSql('CREATE TABLE character_buff (character_id INTEGER NOT NULL, buff_id INTEGER NOT NULL, PRIMARY KEY(character_id, buff_id), CONSTRAINT FK_62DB56FB1136BE75 FOREIGN KEY (character_id) REFERENCES character (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_62DB56FB4B9528D0 FOREIGN KEY (buff_id) REFERENCES buff (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO character_buff (character_id, buff_id) SELECT character_id, buff_id FROM __temp__character_buff');
        $this->addSql('DROP TABLE __temp__character_buff');
        $this->addSql('CREATE INDEX IDX_62DB56FB1136BE75 ON character_buff (character_id)');
        $this->addSql('CREATE INDEX IDX_62DB56FB4B9528D0 ON character_buff (buff_id)');
        $this->addSql('DROP INDEX IDX_3FC1ECB5C70F0E28');
        $this->addSql('CREATE TEMPORARY TABLE __temp__patch_char AS SELECT id, characters_id, title, description FROM patch_char');
        $this->addSql('DROP TABLE patch_char');
        $this->addSql('CREATE TABLE patch_char (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, characters_id INTEGER DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, CONSTRAINT FK_3FC1ECB5C70F0E28 FOREIGN KEY (characters_id) REFERENCES character (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO patch_char (id, characters_id, title, description) SELECT id, characters_id, title, description FROM __temp__patch_char');
        $this->addSql('DROP TABLE __temp__patch_char');
        $this->addSql('CREATE INDEX IDX_3FC1ECB5C70F0E28 ON patch_char (characters_id)');
        $this->addSql('DROP INDEX IDX_C4E0A61F95B82273');
        $this->addSql('DROP INDEX IDX_C4E0A61F1136BE75');
        $this->addSql('DROP INDEX IDX_C4E0A61F1F1F2A24');
        $this->addSql('CREATE TEMPORARY TABLE __temp__team AS SELECT id, weapon_id, character_id, element_id, atk, def, hp, er, em, cr, cd, ed, talent_e, talent_q, talent_aa, name, aaimg, talent_eimg, talent_qimg, cons, rarity FROM team');
        $this->addSql('DROP TABLE team');
        $this->addSql('CREATE TABLE team (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, weapon_id INTEGER DEFAULT NULL, character_id INTEGER DEFAULT NULL, element_id INTEGER DEFAULT NULL, atk INTEGER DEFAULT NULL, def INTEGER DEFAULT NULL, hp INTEGER DEFAULT NULL, er DOUBLE PRECISION DEFAULT NULL, em INTEGER DEFAULT NULL, cr DOUBLE PRECISION DEFAULT NULL, cd DOUBLE PRECISION DEFAULT NULL, ed DOUBLE PRECISION DEFAULT NULL, talent_e INTEGER DEFAULT NULL, talent_q INTEGER DEFAULT NULL, talent_aa INTEGER DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, aaimg CLOB DEFAULT NULL, talent_eimg CLOB DEFAULT NULL, talent_qimg CLOB DEFAULT NULL, cons INTEGER DEFAULT NULL, rarity INTEGER DEFAULT NULL, CONSTRAINT FK_C4E0A61F95B82273 FOREIGN KEY (weapon_id) REFERENCES weapon (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_C4E0A61F1136BE75 FOREIGN KEY (character_id) REFERENCES character (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_C4E0A61F1F1F2A24 FOREIGN KEY (element_id) REFERENCES element (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO team (id, weapon_id, character_id, element_id, atk, def, hp, er, em, cr, cd, ed, talent_e, talent_q, talent_aa, name, aaimg, talent_eimg, talent_qimg, cons, rarity) SELECT id, weapon_id, character_id, element_id, atk, def, hp, er, em, cr, cd, ed, talent_e, talent_q, talent_aa, name, aaimg, talent_eimg, talent_qimg, cons, rarity FROM __temp__team');
        $this->addSql('DROP TABLE __temp__team');
        $this->addSql('CREATE INDEX IDX_C4E0A61F95B82273 ON team (weapon_id)');
        $this->addSql('CREATE INDEX IDX_C4E0A61F1136BE75 ON team (character_id)');
        $this->addSql('CREATE INDEX IDX_C4E0A61F1F1F2A24 ON team (element_id)');
        $this->addSql('DROP INDEX IDX_F0A7BC52E28B07AC');
        $this->addSql('DROP INDEX IDX_F0A7BC52296CD8AE');
        $this->addSql('CREATE TEMPORARY TABLE __temp__team_artifact AS SELECT team_id, artifact_id FROM team_artifact');
        $this->addSql('DROP TABLE team_artifact');
        $this->addSql('CREATE TABLE team_artifact (team_id INTEGER NOT NULL, artifact_id INTEGER NOT NULL, PRIMARY KEY(team_id, artifact_id), CONSTRAINT FK_F0A7BC52296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_F0A7BC52E28B07AC FOREIGN KEY (artifact_id) REFERENCES artifact (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO team_artifact (team_id, artifact_id) SELECT team_id, artifact_id FROM __temp__team_artifact');
        $this->addSql('DROP TABLE __temp__team_artifact');
        $this->addSql('CREATE INDEX IDX_F0A7BC52E28B07AC ON team_artifact (artifact_id)');
        $this->addSql('CREATE INDEX IDX_F0A7BC52296CD8AE ON team_artifact (team_id)');
        $this->addSql('DROP INDEX IDX_2BFEA3A41136BE75');
        $this->addSql('CREATE TEMPORARY TABLE __temp__top3dmg AS SELECT id, character_id FROM top3dmg');
        $this->addSql('DROP TABLE top3dmg');
        $this->addSql('CREATE TABLE top3dmg (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, character_id INTEGER DEFAULT NULL, CONSTRAINT FK_2BFEA3A41136BE75 FOREIGN KEY (character_id) REFERENCES character (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO top3dmg (id, character_id) SELECT id, character_id FROM __temp__top3dmg');
        $this->addSql('DROP TABLE __temp__top3dmg');
        $this->addSql('CREATE INDEX IDX_2BFEA3A41136BE75 ON top3dmg (character_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE spiral_abyss_teams');
        $this->addSql('DROP TABLE spiral_abyss_teams_artifact');
        $this->addSql('DROP TABLE top3_spiral_abyss');
        $this->addSql('DROP INDEX IDX_752742631136BE75');
        $this->addSql('DROP INDEX IDX_7527426395B82273');
        $this->addSql('DROP INDEX IDX_75274263E28B07AC');
        $this->addSql('CREATE TEMPORARY TABLE __temp__buff AS SELECT id, character_id, weapon_id, artifact_id, img, description FROM buff');
        $this->addSql('DROP TABLE buff');
        $this->addSql('CREATE TABLE buff (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, character_id INTEGER DEFAULT NULL, weapon_id INTEGER DEFAULT NULL, artifact_id INTEGER DEFAULT NULL, img CLOB DEFAULT NULL, description CLOB DEFAULT NULL)');
        $this->addSql('INSERT INTO buff (id, character_id, weapon_id, artifact_id, img, description) SELECT id, character_id, weapon_id, artifact_id, img, description FROM __temp__buff');
        $this->addSql('DROP TABLE __temp__buff');
        $this->addSql('CREATE INDEX IDX_752742631136BE75 ON buff (character_id)');
        $this->addSql('CREATE INDEX IDX_7527426395B82273 ON buff (weapon_id)');
        $this->addSql('CREATE INDEX IDX_75274263E28B07AC ON buff (artifact_id)');
        $this->addSql('DROP INDEX IDX_937AB03495B82273');
        $this->addSql('DROP INDEX IDX_937AB0341F1F2A24');
        $this->addSql('CREATE TEMPORARY TABLE __temp__character AS SELECT id, weapon_id, element_id, name, atk, def, hp, er, em, cr, cd, ed, talent_e, talent_q, talent_aa, video_url, weapon_refine, rarity, buff, nation, aaimg, talent_eimg, talent_qimg, cons, active, player_name, ar, abyss_clear, main_char, highest_dmg FROM character');
        $this->addSql('DROP TABLE character');
        $this->addSql('CREATE TABLE character (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, weapon_id INTEGER DEFAULT NULL, element_id INTEGER DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, atk INTEGER DEFAULT NULL, def INTEGER DEFAULT NULL, hp INTEGER DEFAULT NULL, er DOUBLE PRECISION DEFAULT NULL, em INTEGER DEFAULT NULL, cr DOUBLE PRECISION DEFAULT NULL, cd DOUBLE PRECISION DEFAULT NULL, ed DOUBLE PRECISION DEFAULT NULL, talent_e INTEGER DEFAULT NULL, talent_q INTEGER DEFAULT NULL, talent_aa INTEGER DEFAULT NULL, video_url CLOB DEFAULT NULL, weapon_refine VARCHAR(255) DEFAULT NULL, rarity INTEGER DEFAULT NULL, buff CLOB DEFAULT NULL --(DC2Type:array)
        , nation VARCHAR(255) DEFAULT NULL, aaimg CLOB DEFAULT NULL, talent_eimg CLOB DEFAULT NULL, talent_qimg CLOB DEFAULT NULL, cons INTEGER DEFAULT NULL, active INTEGER DEFAULT NULL, player_name VARCHAR(255) DEFAULT NULL, ar VARCHAR(255) DEFAULT NULL, abyss_clear VARCHAR(255) DEFAULT NULL, main_char VARCHAR(255) DEFAULT NULL, highest_dmg INTEGER DEFAULT NULL)');
        $this->addSql('INSERT INTO character (id, weapon_id, element_id, name, atk, def, hp, er, em, cr, cd, ed, talent_e, talent_q, talent_aa, video_url, weapon_refine, rarity, buff, nation, aaimg, talent_eimg, talent_qimg, cons, active, player_name, ar, abyss_clear, main_char, highest_dmg) SELECT id, weapon_id, element_id, name, atk, def, hp, er, em, cr, cd, ed, talent_e, talent_q, talent_aa, video_url, weapon_refine, rarity, buff, nation, aaimg, talent_eimg, talent_qimg, cons, active, player_name, ar, abyss_clear, main_char, highest_dmg FROM __temp__character');
        $this->addSql('DROP TABLE __temp__character');
        $this->addSql('CREATE INDEX IDX_937AB03495B82273 ON character (weapon_id)');
        $this->addSql('CREATE INDEX IDX_937AB0341F1F2A24 ON character (element_id)');
        $this->addSql('DROP INDEX IDX_10E489BD1136BE75');
        $this->addSql('DROP INDEX IDX_10E489BDE28B07AC');
        $this->addSql('CREATE TEMPORARY TABLE __temp__character_artifact AS SELECT character_id, artifact_id FROM character_artifact');
        $this->addSql('DROP TABLE character_artifact');
        $this->addSql('CREATE TABLE character_artifact (character_id INTEGER NOT NULL, artifact_id INTEGER NOT NULL, PRIMARY KEY(character_id, artifact_id))');
        $this->addSql('INSERT INTO character_artifact (character_id, artifact_id) SELECT character_id, artifact_id FROM __temp__character_artifact');
        $this->addSql('DROP TABLE __temp__character_artifact');
        $this->addSql('CREATE INDEX IDX_10E489BD1136BE75 ON character_artifact (character_id)');
        $this->addSql('CREATE INDEX IDX_10E489BDE28B07AC ON character_artifact (artifact_id)');
        $this->addSql('DROP INDEX IDX_62DB56FB1136BE75');
        $this->addSql('DROP INDEX IDX_62DB56FB4B9528D0');
        $this->addSql('CREATE TEMPORARY TABLE __temp__character_buff AS SELECT character_id, buff_id FROM character_buff');
        $this->addSql('DROP TABLE character_buff');
        $this->addSql('CREATE TABLE character_buff (character_id INTEGER NOT NULL, buff_id INTEGER NOT NULL, PRIMARY KEY(character_id, buff_id))');
        $this->addSql('INSERT INTO character_buff (character_id, buff_id) SELECT character_id, buff_id FROM __temp__character_buff');
        $this->addSql('DROP TABLE __temp__character_buff');
        $this->addSql('CREATE INDEX IDX_62DB56FB1136BE75 ON character_buff (character_id)');
        $this->addSql('CREATE INDEX IDX_62DB56FB4B9528D0 ON character_buff (buff_id)');
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
        $this->addSql('CREATE TEMPORARY TABLE __temp__team AS SELECT id, weapon_id, character_id, element_id, atk, def, hp, er, em, cr, cd, ed, talent_e, talent_q, talent_aa, name, aaimg, talent_eimg, talent_qimg, cons, rarity FROM team');
        $this->addSql('DROP TABLE team');
        $this->addSql('CREATE TABLE team (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, weapon_id INTEGER DEFAULT NULL, character_id INTEGER DEFAULT NULL, element_id INTEGER DEFAULT NULL, atk INTEGER DEFAULT NULL, def INTEGER DEFAULT NULL, hp INTEGER DEFAULT NULL, er DOUBLE PRECISION DEFAULT NULL, em INTEGER DEFAULT NULL, cr DOUBLE PRECISION DEFAULT NULL, cd DOUBLE PRECISION DEFAULT NULL, ed DOUBLE PRECISION DEFAULT NULL, talent_e INTEGER DEFAULT NULL, talent_q INTEGER DEFAULT NULL, talent_aa INTEGER DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, aaimg CLOB DEFAULT NULL, talent_eimg CLOB DEFAULT NULL, talent_qimg CLOB DEFAULT NULL, cons INTEGER DEFAULT NULL, rarity INTEGER DEFAULT NULL)');
        $this->addSql('INSERT INTO team (id, weapon_id, character_id, element_id, atk, def, hp, er, em, cr, cd, ed, talent_e, talent_q, talent_aa, name, aaimg, talent_eimg, talent_qimg, cons, rarity) SELECT id, weapon_id, character_id, element_id, atk, def, hp, er, em, cr, cd, ed, talent_e, talent_q, talent_aa, name, aaimg, talent_eimg, talent_qimg, cons, rarity FROM __temp__team');
        $this->addSql('DROP TABLE __temp__team');
        $this->addSql('CREATE INDEX IDX_C4E0A61F95B82273 ON team (weapon_id)');
        $this->addSql('CREATE INDEX IDX_C4E0A61F1136BE75 ON team (character_id)');
        $this->addSql('CREATE INDEX IDX_C4E0A61F1F1F2A24 ON team (element_id)');
        $this->addSql('DROP INDEX IDX_F0A7BC52296CD8AE');
        $this->addSql('DROP INDEX IDX_F0A7BC52E28B07AC');
        $this->addSql('CREATE TEMPORARY TABLE __temp__team_artifact AS SELECT team_id, artifact_id FROM team_artifact');
        $this->addSql('DROP TABLE team_artifact');
        $this->addSql('CREATE TABLE team_artifact (team_id INTEGER NOT NULL, artifact_id INTEGER NOT NULL, PRIMARY KEY(team_id, artifact_id))');
        $this->addSql('INSERT INTO team_artifact (team_id, artifact_id) SELECT team_id, artifact_id FROM __temp__team_artifact');
        $this->addSql('DROP TABLE __temp__team_artifact');
        $this->addSql('CREATE INDEX IDX_F0A7BC52296CD8AE ON team_artifact (team_id)');
        $this->addSql('CREATE INDEX IDX_F0A7BC52E28B07AC ON team_artifact (artifact_id)');
        $this->addSql('DROP INDEX IDX_2BFEA3A41136BE75');
        $this->addSql('CREATE TEMPORARY TABLE __temp__top3dmg AS SELECT id, character_id FROM top3dmg');
        $this->addSql('DROP TABLE top3dmg');
        $this->addSql('CREATE TABLE top3dmg (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, character_id INTEGER DEFAULT NULL)');
        $this->addSql('INSERT INTO top3dmg (id, character_id) SELECT id, character_id FROM __temp__top3dmg');
        $this->addSql('DROP TABLE __temp__top3dmg');
        $this->addSql('CREATE INDEX IDX_2BFEA3A41136BE75 ON top3dmg (character_id)');
    }
}
