<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170616211157 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE flight DROP FOREIGN KEY FK_C257E60EB58CE5C9');
        $this->addSql('ALTER TABLE flight DROP FOREIGN KEY FK_C257E60EE262AD6D');
        $this->addSql('ALTER TABLE flight DROP FOREIGN KEY FK_C257E60EEC141EF8');
        $this->addSql('ALTER TABLE flight ADD CONSTRAINT FK_C257E60EB58CE5C9 FOREIGN KEY (departureAirport) REFERENCES airport (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE flight ADD CONSTRAINT FK_C257E60EE262AD6D FOREIGN KEY (arrivalAirport) REFERENCES airport (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE flight ADD CONSTRAINT FK_C257E60EEC141EF8 FOREIGN KEY (airline) REFERENCES airline (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE airport DROP FOREIGN KEY FK_7E91F7C2F92F3E70');
        $this->addSql('ALTER TABLE airport ADD CONSTRAINT FK_7E91F7C2F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE airline DROP FOREIGN KEY FK_EC141EF8F92F3E70');
        $this->addSql('ALTER TABLE airline ADD CONSTRAINT FK_EC141EF8F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE airline DROP FOREIGN KEY FK_EC141EF8F92F3E70');
        $this->addSql('ALTER TABLE airline ADD CONSTRAINT FK_EC141EF8F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE airport DROP FOREIGN KEY FK_7E91F7C2F92F3E70');
        $this->addSql('ALTER TABLE airport ADD CONSTRAINT FK_7E91F7C2F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE flight DROP FOREIGN KEY FK_C257E60EB58CE5C9');
        $this->addSql('ALTER TABLE flight DROP FOREIGN KEY FK_C257E60EE262AD6D');
        $this->addSql('ALTER TABLE flight DROP FOREIGN KEY FK_C257E60EEC141EF8');
        $this->addSql('ALTER TABLE flight ADD CONSTRAINT FK_C257E60EB58CE5C9 FOREIGN KEY (departureAirport) REFERENCES airport (id)');
        $this->addSql('ALTER TABLE flight ADD CONSTRAINT FK_C257E60EE262AD6D FOREIGN KEY (arrivalAirport) REFERENCES airport (id)');
        $this->addSql('ALTER TABLE flight ADD CONSTRAINT FK_C257E60EEC141EF8 FOREIGN KEY (airline) REFERENCES airline (id)');
    }
}
