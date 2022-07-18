<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220715145220 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE continent (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE continent_animaux (continent_id INT NOT NULL, animaux_id INT NOT NULL, INDEX IDX_8286A2DB921F4C77 (continent_id), INDEX IDX_8286A2DBA9DAECAA (animaux_id), PRIMARY KEY(continent_id, animaux_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE continent_animaux ADD CONSTRAINT FK_8286A2DB921F4C77 FOREIGN KEY (continent_id) REFERENCES continent (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE continent_animaux ADD CONSTRAINT FK_8286A2DBA9DAECAA FOREIGN KEY (animaux_id) REFERENCES animaux (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE animaux ADD CONSTRAINT FK_9ABE194D97A77B84 FOREIGN KEY (famille_id) REFERENCES famille (id)');
        $this->addSql('CREATE INDEX IDX_9ABE194D97A77B84 ON animaux (famille_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE continent_animaux DROP FOREIGN KEY FK_8286A2DB921F4C77');
        $this->addSql('DROP TABLE continent');
        $this->addSql('DROP TABLE continent_animaux');
        $this->addSql('ALTER TABLE animaux DROP FOREIGN KEY FK_9ABE194D97A77B84');
        $this->addSql('DROP INDEX IDX_9ABE194D97A77B84 ON animaux');
    }
}
