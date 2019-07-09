<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190709124625 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE accord DROP FOREIGN KEY FK_91361A04A1D33DF6');
        $this->addSql('DROP INDEX IDX_91361A04A1D33DF6 ON accord');
        $this->addSql('ALTER TABLE accord ADD fondamental VARCHAR(255) NOT NULL, DROP fondamental_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE accord ADD fondamental_id INT DEFAULT NULL, DROP fondamental');
        $this->addSql('ALTER TABLE accord ADD CONSTRAINT FK_91361A04A1D33DF6 FOREIGN KEY (fondamental_id) REFERENCES note (id)');
        $this->addSql('CREATE INDEX IDX_91361A04A1D33DF6 ON accord (fondamental_id)');
    }
}
