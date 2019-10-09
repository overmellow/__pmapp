<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191002003201 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE temp_ticket (id INT AUTO_INCREMENT NOT NULL, lottery_id INT NOT NULL, ticket_number INT NOT NULL, picked_at DATETIME NOT NULL, timer INT NOT NULL, status VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_E0313D94CFAA77DD (lottery_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE temp_ticket ADD CONSTRAINT FK_E0313D94CFAA77DD FOREIGN KEY (lottery_id) REFERENCES lottery (id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL, CHANGE lucky_charm lucky_charm VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE ticket CHANGE purchased_at purchased_at DATETIME DEFAULT CURRENT_TIMESTAMP');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE temp_ticket');
        $this->addSql('ALTER TABLE ticket CHANGE purchased_at purchased_at DATETIME DEFAULT \'current_timestamp()\'');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_bin, CHANGE lucky_charm lucky_charm VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
