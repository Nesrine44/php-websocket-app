<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211113184909 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_table (order_id INT NOT NULL, table_id INT NOT NULL, INDEX IDX_75B7FBBB8D9F6D38 (order_id), INDEX IDX_75B7FBBBECFF285C (table_id), PRIMARY KEY(order_id, table_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_user (order_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_C062EC5E8D9F6D38 (order_id), INDEX IDX_C062EC5EA76ED395 (user_id), PRIMARY KEY(order_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_consommable (order_id INT NOT NULL, consommable_id INT NOT NULL, INDEX IDX_BBFE00CB8D9F6D38 (order_id), INDEX IDX_BBFE00CBC9CEB381 (consommable_id), PRIMARY KEY(order_id, consommable_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE order_table ADD CONSTRAINT FK_75B7FBBB8D9F6D38 FOREIGN KEY (order_id) REFERENCES `order` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE order_table ADD CONSTRAINT FK_75B7FBBBECFF285C FOREIGN KEY (table_id) REFERENCES `table` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE order_user ADD CONSTRAINT FK_C062EC5E8D9F6D38 FOREIGN KEY (order_id) REFERENCES `order` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE order_user ADD CONSTRAINT FK_C062EC5EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE order_consommable ADD CONSTRAINT FK_BBFE00CB8D9F6D38 FOREIGN KEY (order_id) REFERENCES `order` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE order_consommable ADD CONSTRAINT FK_BBFE00CBC9CEB381 FOREIGN KEY (consommable_id) REFERENCES consommable (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_table DROP FOREIGN KEY FK_75B7FBBB8D9F6D38');
        $this->addSql('ALTER TABLE order_user DROP FOREIGN KEY FK_C062EC5E8D9F6D38');
        $this->addSql('ALTER TABLE order_consommable DROP FOREIGN KEY FK_BBFE00CB8D9F6D38');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE order_table');
        $this->addSql('DROP TABLE order_user');
        $this->addSql('DROP TABLE order_consommable');
    }
}
