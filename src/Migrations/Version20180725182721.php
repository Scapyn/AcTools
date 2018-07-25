<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180725182721 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE act_mail_act_contact (act_mail_id INT NOT NULL, act_contact_id INT NOT NULL, INDEX IDX_AB17FB4BB45F84AB (act_mail_id), INDEX IDX_AB17FB4BBB717F5D (act_contact_id), PRIMARY KEY(act_mail_id, act_contact_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE act_mail_act_contact ADD CONSTRAINT FK_AB17FB4BB45F84AB FOREIGN KEY (act_mail_id) REFERENCES act_mail (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE act_mail_act_contact ADD CONSTRAINT FK_AB17FB4BBB717F5D FOREIGN KEY (act_contact_id) REFERENCES act_contact (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE act_mail_act_contact');
    }
}
