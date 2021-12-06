<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211204135337 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE parents ADD roles JSON NOT NULL');
        $this->addSql('ALTER TABLE answer DROP checked');
        $this->addSql('ALTER TABLE answer RENAME INDEX idchecklist TO IDX_DADD4A25B1E947');
        $this->addSql('ALTER TABLE rdv DROP dateRDV');
        $this->addSql('ALTER TABLE rdv RENAME INDEX idcalendar TO IDX_10C31F863D0A8B1D');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE answer ADD checked TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE answer RENAME INDEX idx_dadd4a25b1e947 TO idCheckList');
        $this->addSql('ALTER TABLE parents DROP roles');
        $this->addSql('ALTER TABLE rdv ADD dateRDV DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE rdv RENAME INDEX idx_10c31f863d0a8b1d TO idCalendar');
    }
}
