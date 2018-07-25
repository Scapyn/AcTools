<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180725165455 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE act_mail_act_document (act_mail_id INT NOT NULL, act_document_id INT NOT NULL, INDEX IDX_1182DFEDB45F84AB (act_mail_id), INDEX IDX_1182DFED40B02DAA (act_document_id), PRIMARY KEY(act_mail_id, act_document_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE act_mail_act_document ADD CONSTRAINT FK_1182DFEDB45F84AB FOREIGN KEY (act_mail_id) REFERENCES act_mail (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE act_mail_act_document ADD CONSTRAINT FK_1182DFED40B02DAA FOREIGN KEY (act_document_id) REFERENCES act_document (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE act_mail_act_document');
    }
}
