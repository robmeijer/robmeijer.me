<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251101160718 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add Position and Skill tables';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE position (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL, period VARCHAR(255) NOT NULL, company VARCHAR(255) NOT NULL, details CLOB NOT NULL --(DC2Type:json)
        , achievements CLOB DEFAULT NULL --(DC2Type:json)
        , skills CLOB DEFAULT NULL --(DC2Type:json)
        )');
        $this->addSql('CREATE TABLE skill (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, type VARCHAR(255) NOT NULL, keywords CLOB NOT NULL --(DC2Type:json)
        )');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE position');
        $this->addSql('DROP TABLE skill');
    }
}
