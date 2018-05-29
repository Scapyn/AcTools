<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180529141244 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE act_person_act_user (act_person_id INT NOT NULL, act_user_id INT NOT NULL, INDEX IDX_3CAB11A7424BA8FC (act_person_id), INDEX IDX_3CAB11A7DB46383F (act_user_id), PRIMARY KEY(act_person_id, act_user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE act_person_act_user ADD CONSTRAINT FK_3CAB11A7424BA8FC FOREIGN KEY (act_person_id) REFERENCES act_person (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE act_person_act_user ADD CONSTRAINT FK_3CAB11A7DB46383F FOREIGN KEY (act_user_id) REFERENCES act_user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE act_person_act_user');
    }
}
