<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180428200738 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE app_users (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(25) NOT NULL, firstname VARCHAR(25) DEFAULT NULL, lastname VARCHAR(25) DEFAULT NULL, surname VARCHAR(25) DEFAULT NULL, password VARCHAR(64) NOT NULL, email VARCHAR(254) NOT NULL, is_active TINYINT(1) NOT NULL, date_creation VARCHAR(10) DEFAULT NULL, UNIQUE INDEX UNIQ_C250282483A00E68 (firstname), UNIQUE INDEX UNIQ_C2502824E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE act_user');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE act_user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(25) NOT NULL COLLATE utf8mb4_unicode_ci, firstname VARCHAR(25) DEFAULT NULL COLLATE utf8mb4_unicode_ci, lastname VARCHAR(25) DEFAULT NULL COLLATE utf8mb4_unicode_ci, surname VARCHAR(25) DEFAULT NULL COLLATE utf8mb4_unicode_ci, password VARCHAR(64) NOT NULL COLLATE utf8mb4_unicode_ci, email VARCHAR(254) NOT NULL COLLATE utf8mb4_unicode_ci, is_active TINYINT(1) NOT NULL, date_creation VARCHAR(10) DEFAULT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE app_users');
    }
}
