<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231023084340 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE club (ref INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(ref)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE student ADD ref INT DEFAULT NULL');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF33146F3EA3 FOREIGN KEY (ref) REFERENCES club (ref)');
        $this->addSql('CREATE INDEX IDX_B723AF33146F3EA3 ON student (ref)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF33146F3EA3');
        $this->addSql('DROP TABLE club');
        $this->addSql('DROP INDEX IDX_B723AF33146F3EA3 ON student');
        $this->addSql('ALTER TABLE student DROP ref');
    }
}
