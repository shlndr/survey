<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200213030602 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE stat (id INT AUTO_INCREMENT NOT NULL, survey_title VARCHAR(400) NOT NULL, survey_id VARCHAR(300) NOT NULL, survey_url VARCHAR(500) NOT NULL, visitor_email VARCHAR(300) DEFAULT NULL, survey_option LONGTEXT NOT NULL, survey_option_selected VARCHAR(255) NOT NULL, utm_source VARCHAR(300) DEFAULT NULL, utm_medium VARCHAR(300) DEFAULT NULL, utm_campaign VARCHAR(300) DEFAULT NULL, utm_term VARCHAR(300) DEFAULT NULL, utm_content VARCHAR(300) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE se_role_settings CHANGE value value VARCHAR(65535) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE stat');
        $this->addSql('ALTER TABLE se_role_settings CHANGE value value MEDIUMTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
