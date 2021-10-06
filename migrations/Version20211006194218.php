<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211006194218 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, main_picture_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, prix DOUBLE PRECISION DEFAULT NULL, remise INT DEFAULT NULL, INDEX IDX_23A0E66D6BDC9DC (main_picture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_photo (article_id INT NOT NULL, photo_id INT NOT NULL, INDEX IDX_6300F6097294869C (article_id), INDEX IDX_6300F6097E9E4C8C (photo_id), PRIMARY KEY(article_id, photo_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, customer VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, postcode VARCHAR(16) NOT NULL, amound DOUBLE PRECISION NOT NULL, phone VARCHAR(32) NOT NULL, new TINYINT(1) DEFAULT \'1\' NOT NULL, received_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', in_progress TINYINT(1) DEFAULT \'0\' NOT NULL, in_progress_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', shipped TINYINT(1) DEFAULT \'0\' NOT NULL, shipped_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', complete TINYINT(1) DEFAULT \'0\' NOT NULL, completed_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', tracking_number VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_article (order_id INT NOT NULL, article_id INT NOT NULL, INDEX IDX_F440A72D8D9F6D38 (order_id), INDEX IDX_F440A72D7294869C (article_id), PRIMARY KEY(order_id, article_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, url LONGTEXT NOT NULL, alt VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, copy TINYINT(1) DEFAULT \'0\' NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66D6BDC9DC FOREIGN KEY (main_picture_id) REFERENCES photo (id)');
        $this->addSql('ALTER TABLE article_photo ADD CONSTRAINT FK_6300F6097294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_photo ADD CONSTRAINT FK_6300F6097E9E4C8C FOREIGN KEY (photo_id) REFERENCES photo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE order_article ADD CONSTRAINT FK_F440A72D8D9F6D38 FOREIGN KEY (order_id) REFERENCES `order` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE order_article ADD CONSTRAINT FK_F440A72D7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article_photo DROP FOREIGN KEY FK_6300F6097294869C');
        $this->addSql('ALTER TABLE order_article DROP FOREIGN KEY FK_F440A72D7294869C');
        $this->addSql('ALTER TABLE order_article DROP FOREIGN KEY FK_F440A72D8D9F6D38');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66D6BDC9DC');
        $this->addSql('ALTER TABLE article_photo DROP FOREIGN KEY FK_6300F6097E9E4C8C');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_photo');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE order_article');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE user');
    }
}
