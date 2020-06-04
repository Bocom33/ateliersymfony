<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200529135657 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE offer (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidat (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidat_offer (candidat_id INT NOT NULL, offer_id INT NOT NULL, INDEX IDX_E93BEB4C8D0EB82 (candidat_id), INDEX IDX_E93BEB4C53C674EE (offer_id), PRIMARY KEY(candidat_id, offer_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidat_offer ADD CONSTRAINT FK_E93BEB4C8D0EB82 FOREIGN KEY (candidat_id) REFERENCES candidat (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidat_offer ADD CONSTRAINT FK_E93BEB4C53C674EE FOREIGN KEY (offer_id) REFERENCES offer (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE candidat_offer DROP FOREIGN KEY FK_E93BEB4C53C674EE');
        $this->addSql('ALTER TABLE candidat_offer DROP FOREIGN KEY FK_E93BEB4C8D0EB82');
        $this->addSql('DROP TABLE offer');
        $this->addSql('DROP TABLE candidat');
        $this->addSql('DROP TABLE candidat_offer');
    }
}
