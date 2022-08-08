<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220808130608 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE aliment (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, joules DOUBLE PRECISION DEFAULT NULL, calories DOUBLE PRECISION DEFAULT NULL, carbohydrate DOUBLE PRECISION DEFAULT NULL, starch DOUBLE PRECISION DEFAULT NULL, sugars DOUBLE PRECISION DEFAULT NULL, dietary_fibres DOUBLE PRECISION DEFAULT NULL, proteins DOUBLE PRECISION DEFAULT NULL, lipids DOUBLE PRECISION DEFAULT NULL, saturated_fats DOUBLE PRECISION DEFAULT NULL, omega_3 DOUBLE PRECISION DEFAULT NULL, omega_6 DOUBLE PRECISION DEFAULT NULL, omega_9 DOUBLE PRECISION DEFAULT NULL, water DOUBLE PRECISION DEFAULT NULL, ashes DOUBLE PRECISION NOT NULL, sources LONGTEXT DEFAULT NULL, description LONGTEXT NOT NULL, INDEX IDX_70FF972BA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE aliment_article (aliment_id INT NOT NULL, article_id INT NOT NULL, INDEX IDX_E51792AA415B9F11 (aliment_id), INDEX IDX_E51792AA7294869C (article_id), PRIMARY KEY(aliment_id, article_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, title VARCHAR(255) NOT NULL, subject VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, sources LONGTEXT DEFAULT NULL, INDEX IDX_23A0E66A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE receipe (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, content LONGTEXT NOT NULL, cooking_time SMALLINT NOT NULL, number_of_persons SMALLINT NOT NULL, sources LONGTEXT NOT NULL, INDEX IDX_392996B7A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE receipe_aliment (receipe_id INT NOT NULL, aliment_id INT NOT NULL, INDEX IDX_D80E64E7C3F9986C (receipe_id), INDEX IDX_D80E64E7415B9F11 (aliment_id), PRIMARY KEY(receipe_id, aliment_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(100) NOT NULL, lastname VARCHAR(100) NOT NULL, nickname VARCHAR(100) DEFAULT NULL, gender VARCHAR(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE aliment ADD CONSTRAINT FK_70FF972BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE aliment_article ADD CONSTRAINT FK_E51792AA415B9F11 FOREIGN KEY (aliment_id) REFERENCES aliment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE aliment_article ADD CONSTRAINT FK_E51792AA7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE receipe ADD CONSTRAINT FK_392996B7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE receipe_aliment ADD CONSTRAINT FK_D80E64E7C3F9986C FOREIGN KEY (receipe_id) REFERENCES receipe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE receipe_aliment ADD CONSTRAINT FK_D80E64E7415B9F11 FOREIGN KEY (aliment_id) REFERENCES aliment (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE aliment_article DROP FOREIGN KEY FK_E51792AA415B9F11');
        $this->addSql('ALTER TABLE receipe_aliment DROP FOREIGN KEY FK_D80E64E7415B9F11');
        $this->addSql('ALTER TABLE aliment_article DROP FOREIGN KEY FK_E51792AA7294869C');
        $this->addSql('ALTER TABLE receipe_aliment DROP FOREIGN KEY FK_D80E64E7C3F9986C');
        $this->addSql('ALTER TABLE aliment DROP FOREIGN KEY FK_70FF972BA76ED395');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66A76ED395');
        $this->addSql('ALTER TABLE receipe DROP FOREIGN KEY FK_392996B7A76ED395');
        $this->addSql('DROP TABLE aliment');
        $this->addSql('DROP TABLE aliment_article');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE receipe');
        $this->addSql('DROP TABLE receipe_aliment');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
