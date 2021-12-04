<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211204103214 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY images_ibfk_1');
        $this->addSql('ALTER TABLE infosBaby DROP FOREIGN KEY infosbaby_ibfk_1');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY rdv_ibfk_2');
        $this->addSql('ALTER TABLE calendar DROP FOREIGN KEY calendar_ibfk_1');
        $this->addSql('ALTER TABLE calendar DROP FOREIGN KEY calendar_ibfk_2');
        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY answer_ibfk_2');
        $this->addSql('ALTER TABLE checkList DROP FOREIGN KEY checklist_ibfk_2');
        $this->addSql('ALTER TABLE checkList DROP FOREIGN KEY checklist_ibfk_1');
        $this->addSql('ALTER TABLE parents DROP FOREIGN KEY parents_ibfk_1');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY images_ibfk_2');
        $this->addSql('DROP TABLE advice');
        $this->addSql('DROP TABLE answer');
        $this->addSql('DROP TABLE baby');
        $this->addSql('DROP TABLE calendar');
        $this->addSql('DROP TABLE calendarItems');
        $this->addSql('DROP TABLE calendarList');
        $this->addSql('DROP TABLE checkList');
        $this->addSql('DROP TABLE checkListItems');
        $this->addSql('DROP TABLE checkListName');
        $this->addSql('DROP TABLE goodPlan');
        $this->addSql('DROP TABLE images');
        $this->addSql('DROP TABLE infosBaby');
        $this->addSql('DROP TABLE pregnancy');
        $this->addSql('DROP TABLE rdv');
        $this->addSql('DROP TABLE roles');
        $this->addSql('DROP TABLE typeImage');
        $this->addSql('DROP INDEX idRole ON parents');
        $this->addSql('ALTER TABLE parents ADD id_parent INT AUTO_INCREMENT NOT NULL, ADD roles JSON NOT NULL, ADD parent1_name VARCHAR(100) DEFAULT NULL, ADD parent2_name VARCHAR(100) DEFAULT NULL, ADD postal_code SMALLINT DEFAULT NULL, DROP idParent, DROP parent1Name, DROP parent2Name, DROP postalCode, DROP idRole, CHANGE email email VARCHAR(180) NOT NULL, CHANGE password password VARCHAR(255) NOT NULL, CHANGE sharecode share_code VARCHAR(64) DEFAULT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id_parent)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FD501D6AE7927C74 ON parents (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE advice (idAdvice INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, content TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(idAdvice)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE answer (idParent BIGINT NOT NULL, idCheckList BIGINT NOT NULL, checked TINYINT(1) DEFAULT NULL, INDEX idCheckList (idCheckList), INDEX IDX_DADD4A255E9FC8D5 (idParent), PRIMARY KEY(idParent, idCheckList)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE baby (idBaby BIGINT AUTO_INCREMENT NOT NULL, name VARCHAR(50) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, sexe TINYINT(1) DEFAULT NULL, share TINYINT(1) DEFAULT NULL, idParent BIGINT DEFAULT NULL, INDEX idParent (idParent), PRIMARY KEY(idBaby)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE calendar (idCalendar BIGINT AUTO_INCREMENT NOT NULL, idCalendarItem INT DEFAULT NULL, idCalendarList INT DEFAULT NULL, INDEX idCalendarList (idCalendarList), INDEX idCalendarItem (idCalendarItem), PRIMARY KEY(idCalendar)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE calendarItems (idCalendarItem INT AUTO_INCREMENT NOT NULL, nameItem VARCHAR(50) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(idCalendarItem)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE calendarList (idCalendarList INT AUTO_INCREMENT NOT NULL, nameCalendar VARCHAR(50) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(idCalendarList)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE checkList (idCheckList BIGINT AUTO_INCREMENT NOT NULL, idCheckListName INT DEFAULT NULL, idCheckListItems INT DEFAULT NULL, INDEX idCheckListItems (idCheckListItems), INDEX idCheckListName (idCheckListName), PRIMARY KEY(idCheckList)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE checkListItems (idCheckListItems INT AUTO_INCREMENT NOT NULL, nameItem VARCHAR(50) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(idCheckListItems)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE checkListName (idCheckListName INT AUTO_INCREMENT NOT NULL, nameCheckList VARCHAR(50) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(idCheckListName)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE goodPlan (idGoogPlan INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, content TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, url VARCHAR(200) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(idGoogPlan)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE images (idImage BIGINT AUTO_INCREMENT NOT NULL, url VARCHAR(500) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, name VARCHAR(50) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, comment TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, share TINYINT(1) DEFAULT NULL, idBaby BIGINT DEFAULT NULL, idTypeImage BIGINT DEFAULT NULL, INDEX idTypeImage (idTypeImage), INDEX idBaby (idBaby), PRIMARY KEY(idImage)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE infosBaby (idInfoBaby BIGINT AUTO_INCREMENT NOT NULL, size INT DEFAULT NULL, weight NUMERIC(5, 2) DEFAULT NULL, age INT DEFAULT NULL, weekPregnancy INT DEFAULT NULL, share TINYINT(1) DEFAULT NULL, idBaby BIGINT DEFAULT NULL, INDEX idBaby (idBaby), PRIMARY KEY(idInfoBaby)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE pregnancy (idPregnancy BIGINT AUTO_INCREMENT NOT NULL, dateFertilization DATE DEFAULT NULL, dateDelivery DATE DEFAULT NULL, share TINYINT(1) DEFAULT NULL, idParent BIGINT DEFAULT NULL, INDEX idParent (idParent), PRIMARY KEY(idPregnancy)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE rdv (idParent BIGINT NOT NULL, idCalendar BIGINT NOT NULL, dateRDV DATE DEFAULT NULL, INDEX idCalendar (idCalendar), INDEX IDX_10C31F865E9FC8D5 (idParent), PRIMARY KEY(idParent, idCalendar)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE roles (idRole BIGINT AUTO_INCREMENT NOT NULL, role VARCHAR(50) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(idRole)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE typeImage (idTypeImage BIGINT AUTO_INCREMENT NOT NULL, typeImage VARCHAR(50) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(idTypeImage)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT answer_ibfk_1 FOREIGN KEY (idParent) REFERENCES parents (idParent)');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT answer_ibfk_2 FOREIGN KEY (idCheckList) REFERENCES checkList (idCheckList)');
        $this->addSql('ALTER TABLE baby ADD CONSTRAINT baby_ibfk_1 FOREIGN KEY (idParent) REFERENCES parents (idParent)');
        $this->addSql('ALTER TABLE calendar ADD CONSTRAINT calendar_ibfk_1 FOREIGN KEY (idCalendarItem) REFERENCES calendarItems (idCalendarItem)');
        $this->addSql('ALTER TABLE calendar ADD CONSTRAINT calendar_ibfk_2 FOREIGN KEY (idCalendarList) REFERENCES calendarList (idCalendarList)');
        $this->addSql('ALTER TABLE checkList ADD CONSTRAINT checklist_ibfk_1 FOREIGN KEY (idCheckListName) REFERENCES checkListName (idCheckListName)');
        $this->addSql('ALTER TABLE checkList ADD CONSTRAINT checklist_ibfk_2 FOREIGN KEY (idCheckListItems) REFERENCES checkListItems (idCheckListItems)');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT images_ibfk_1 FOREIGN KEY (idBaby) REFERENCES baby (idBaby)');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT images_ibfk_2 FOREIGN KEY (idTypeImage) REFERENCES typeImage (idTypeImage)');
        $this->addSql('ALTER TABLE infosBaby ADD CONSTRAINT infosbaby_ibfk_1 FOREIGN KEY (idBaby) REFERENCES baby (idBaby)');
        $this->addSql('ALTER TABLE pregnancy ADD CONSTRAINT pregnancy_ibfk_1 FOREIGN KEY (idParent) REFERENCES parents (idParent)');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT rdv_ibfk_1 FOREIGN KEY (idParent) REFERENCES parents (idParent)');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT rdv_ibfk_2 FOREIGN KEY (idCalendar) REFERENCES calendar (idCalendar)');
        $this->addSql('ALTER TABLE parents MODIFY id_parent INT NOT NULL');
        $this->addSql('DROP INDEX UNIQ_FD501D6AE7927C74 ON parents');
        $this->addSql('ALTER TABLE parents DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE parents ADD idParent BIGINT AUTO_INCREMENT NOT NULL, ADD parent1Name VARCHAR(50) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, ADD parent2Name VARCHAR(50) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, ADD postalCode INT DEFAULT NULL, ADD idRole BIGINT DEFAULT NULL, DROP id_parent, DROP roles, DROP parent1_name, DROP parent2_name, DROP postal_code, CHANGE email email VARCHAR(50) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE password password VARCHAR(64) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE share_code shareCode VARCHAR(64) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`');
        $this->addSql('ALTER TABLE parents ADD CONSTRAINT parents_ibfk_1 FOREIGN KEY (idRole) REFERENCES roles (idRole)');
        $this->addSql('CREATE INDEX idRole ON parents (idRole)');
        $this->addSql('ALTER TABLE parents ADD PRIMARY KEY (idParent)');
    }
}
