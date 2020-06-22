<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200514005302 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE projets_user (projets_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_B7E8CA9597A6CB7 (projets_id), INDEX IDX_B7E8CA9A76ED395 (user_id), PRIMARY KEY(projets_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE projets_user ADD CONSTRAINT FK_B7E8CA9597A6CB7 FOREIGN KEY (projets_id) REFERENCES projets (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projets_user ADD CONSTRAINT FK_B7E8CA9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE materiels ADD taches_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE materiels ADD CONSTRAINT FK_9C1EBE69B8A61670 FOREIGN KEY (taches_id) REFERENCES taches (id)');
        $this->addSql('CREATE INDEX IDX_9C1EBE69B8A61670 ON materiels (taches_id)');
        $this->addSql('ALTER TABLE ouvriers ADD taches_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ouvriers ADD CONSTRAINT FK_50E74531B8A61670 FOREIGN KEY (taches_id) REFERENCES taches (id)');
        $this->addSql('CREATE INDEX IDX_50E74531B8A61670 ON ouvriers (taches_id)');
        $this->addSql('ALTER TABLE taches ADD projets_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE taches ADD CONSTRAINT FK_3BF2CD98597A6CB7 FOREIGN KEY (projets_id) REFERENCES projets (id)');
        $this->addSql('CREATE INDEX IDX_3BF2CD98597A6CB7 ON taches (projets_id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE projets_user');
        $this->addSql('ALTER TABLE materiels DROP FOREIGN KEY FK_9C1EBE69B8A61670');
        $this->addSql('DROP INDEX IDX_9C1EBE69B8A61670 ON materiels');
        $this->addSql('ALTER TABLE materiels DROP taches_id');
        $this->addSql('ALTER TABLE ouvriers DROP FOREIGN KEY FK_50E74531B8A61670');
        $this->addSql('DROP INDEX IDX_50E74531B8A61670 ON ouvriers');
        $this->addSql('ALTER TABLE ouvriers DROP taches_id');
        $this->addSql('ALTER TABLE taches DROP FOREIGN KEY FK_3BF2CD98597A6CB7');
        $this->addSql('DROP INDEX IDX_3BF2CD98597A6CB7 ON taches');
        $this->addSql('ALTER TABLE taches DROP projets_id');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
