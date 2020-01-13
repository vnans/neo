<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200108164841 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE scout (id INT AUTO_INCREMENT NOT NULL, nomprenoms VARCHAR(255) NOT NULL, datenaiss DATETIME DEFAULT NULL, lieunaiss VARCHAR(255) DEFAULT NULL, nationalite VARCHAR(20) DEFAULT NULL, tel VARCHAR(20) NOT NULL, boitepostal VARCHAR(20) DEFAULT NULL, paroisse VARCHAR(30) NOT NULL, baptise TINYINT(1) NOT NULL, baptisepar VARCHAR(20) NOT NULL, datebapteme DATETIME DEFAULT NULL, lieubapteme VARCHAR(20) DEFAULT NULL, fonctionparoisse VARCHAR(30) DEFAULT NULL, datescout DATETIME NOT NULL, datepromesse DATETIME NOT NULL, lieupromesse VARCHAR(30) NOT NULL, fctscoutactu VARCHAR(255) NOT NULL, datenomi DATETIME DEFAULT NULL, stage1 VARCHAR(255) DEFAULT NULL, stage1date DATETIME DEFAULT NULL, stage1lieu VARCHAR(255) NOT NULL, stage2 VARCHAR(255) DEFAULT NULL, stage2date DATETIME DEFAULT NULL, stage2lieu VARCHAR(255) DEFAULT NULL, stage3 VARCHAR(255) DEFAULT NULL, stage3date DATETIME DEFAULT NULL, stage3lieu VARCHAR(255) DEFAULT NULL, stageinter1 VARCHAR(255) DEFAULT NULL, stageinter1date DATETIME DEFAULT NULL, stageinter1lieu VARCHAR(255) DEFAULT NULL, stageinter2 VARCHAR(255) DEFAULT NULL, stageinter2date DATETIME DEFAULT NULL, stageinter2lieu VARCHAR(255) DEFAULT NULL, profession VARCHAR(255) NOT NULL, img VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE scout');
    }
}
