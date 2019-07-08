<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190705074114 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE accord (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE accord_note (accord_id INT NOT NULL, note_id INT NOT NULL, INDEX IDX_1000B94D1EDF023F (accord_id), INDEX IDX_1000B94D26ED0855 (note_id), PRIMARY KEY(accord_id, note_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE note (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE accord_note ADD CONSTRAINT FK_1000B94D1EDF023F FOREIGN KEY (accord_id) REFERENCES accord (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accord_note ADD CONSTRAINT FK_1000B94D26ED0855 FOREIGN KEY (note_id) REFERENCES note (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE accord_note DROP FOREIGN KEY FK_1000B94D1EDF023F');
        $this->addSql('ALTER TABLE accord_note DROP FOREIGN KEY FK_1000B94D26ED0855');
        $this->addSql('DROP TABLE accord');
        $this->addSql('DROP TABLE accord_note');
        $this->addSql('DROP TABLE note');
    }
}
