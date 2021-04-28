<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210427223715 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ps_user ADD subscription_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ps_user ADD CONSTRAINT FK_EA2621759A1887DC FOREIGN KEY (subscription_id) REFERENCES ps_subscription (id)');
        $this->addSql('CREATE INDEX IDX_EA2621759A1887DC ON ps_user (subscription_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ps_user DROP FOREIGN KEY FK_EA2621759A1887DC');
        $this->addSql('DROP INDEX IDX_EA2621759A1887DC ON ps_user');
        $this->addSql('ALTER TABLE ps_user DROP subscription_id');
    }
}
