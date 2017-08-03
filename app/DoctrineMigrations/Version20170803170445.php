<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170803170445 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE fos_user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, confirmation_token VARCHAR(180) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_957A647992FC23A8 (username_canonical), UNIQUE INDEX UNIQ_957A6479A0D96FBF (email_canonical), UNIQUE INDEX UNIQ_957A6479C05FB297 (confirmation_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number (id INT AUTO_INCREMENT NOT NULL, value INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE blah (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, age INT NOT NULL, tomo INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE flight (id INT AUTO_INCREMENT NOT NULL, airline INT NOT NULL, flightNumber INT NOT NULL, flightCode VARCHAR(255) NOT NULL, departureTime DATETIME NOT NULL, arrivalTime DATETIME NOT NULL, departureAirport INT NOT NULL, arrivalAirport INT NOT NULL, UNIQUE INDEX UNIQ_C257E60EC8533C58 (flightNumber), INDEX IDX_C257E60EB58CE5C9 (departureAirport), INDEX IDX_C257E60EE262AD6D (arrivalAirport), INDEX IDX_C257E60EEC141EF8 (airline), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE airport (id INT AUTO_INCREMENT NOT NULL, country_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, INDEX IDX_7E91F7C2F92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE airline (id INT AUTO_INCREMENT NOT NULL, country_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_EC141EF8F92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, country_code VARCHAR(255) NOT NULL, country_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_5373C966F026BB7C (country_code), UNIQUE INDEX UNIQ_5373C966D910F5E2 (country_name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE flight ADD CONSTRAINT FK_C257E60EB58CE5C9 FOREIGN KEY (departureAirport) REFERENCES airport (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE flight ADD CONSTRAINT FK_C257E60EE262AD6D FOREIGN KEY (arrivalAirport) REFERENCES airport (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE flight ADD CONSTRAINT FK_C257E60EEC141EF8 FOREIGN KEY (airline) REFERENCES airline (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE airport ADD CONSTRAINT FK_7E91F7C2F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE airline ADD CONSTRAINT FK_EC141EF8F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id) ON DELETE SET NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE flight DROP FOREIGN KEY FK_C257E60EB58CE5C9');
        $this->addSql('ALTER TABLE flight DROP FOREIGN KEY FK_C257E60EE262AD6D');
        $this->addSql('ALTER TABLE flight DROP FOREIGN KEY FK_C257E60EEC141EF8');
        $this->addSql('ALTER TABLE airport DROP FOREIGN KEY FK_7E91F7C2F92F3E70');
        $this->addSql('ALTER TABLE airline DROP FOREIGN KEY FK_EC141EF8F92F3E70');
        $this->addSql('DROP TABLE fos_user');
        $this->addSql('DROP TABLE number');
        $this->addSql('DROP TABLE blah');
        $this->addSql('DROP TABLE flight');
        $this->addSql('DROP TABLE airport');
        $this->addSql('DROP TABLE airline');
        $this->addSql('DROP TABLE country');
    }
}
