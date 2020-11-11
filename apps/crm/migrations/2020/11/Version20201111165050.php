<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201111165050 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create user table ';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE user (
            id CHAR(36) NOT NULL,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
        PRIMARY KEY(id))');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE user');
    }
}

