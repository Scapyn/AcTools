<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180529141618 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE act_document ADD act_users_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE act_document ADD CONSTRAINT FK_EE16E86B51CCD620 FOREIGN KEY (act_users_id) REFERENCES act_user (id)');
        $this->addSql('CREATE INDEX IDX_EE16E86B51CCD620 ON act_document (act_users_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE act_document DROP FOREIGN KEY FK_EE16E86B51CCD620');
        $this->addSql('DROP INDEX IDX_EE16E86B51CCD620 ON act_document');
        $this->addSql('ALTER TABLE act_document DROP act_users_id');
    }
}
