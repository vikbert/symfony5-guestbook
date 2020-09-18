<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200917065922 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'add new property: state, which has the values: submitted, spam, published';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql('ALTER TABLE comment ADD state VARCHAR(32)');
        $this->addSql("UPDATE comment SET state='published'");
        $this->addSql('ALTER TABLE comment ALTER COLUMN state SET NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('ALTER TABLE comment DROP state');
    }
}
