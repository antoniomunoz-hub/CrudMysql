<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210914000112 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B8D75A50E7927C74 ON empresa (email)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B8D75A50C1E70A7F ON empresa (telefono)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4BA3D9E83A909126 ON sector (nombre)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_B8D75A50E7927C74 ON empresa');
        $this->addSql('DROP INDEX UNIQ_B8D75A50C1E70A7F ON empresa');
        $this->addSql('DROP INDEX UNIQ_4BA3D9E83A909126 ON sector');
    }
}
