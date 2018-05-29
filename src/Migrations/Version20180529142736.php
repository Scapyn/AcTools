<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180529142736 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE act_contact ADD person_id INT NOT NULL, ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE act_contact ADD CONSTRAINT FK_304A0D92217BBB47 FOREIGN KEY (person_id) REFERENCES act_person (id)');
        $this->addSql('ALTER TABLE act_contact ADD CONSTRAINT FK_304A0D92A76ED395 FOREIGN KEY (user_id) REFERENCES act_user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_304A0D92217BBB47 ON act_contact (person_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_304A0D92A76ED395 ON act_contact (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE act_contact DROP FOREIGN KEY FK_304A0D92217BBB47');
        $this->addSql('ALTER TABLE act_contact DROP FOREIGN KEY FK_304A0D92A76ED395');
        $this->addSql('DROP INDEX UNIQ_304A0D92217BBB47 ON act_contact');
        $this->addSql('DROP INDEX UNIQ_304A0D92A76ED395 ON act_contact');
        $this->addSql('ALTER TABLE act_contact DROP person_id, DROP user_id');
    }
}
