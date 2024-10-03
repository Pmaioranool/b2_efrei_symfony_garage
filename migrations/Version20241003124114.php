<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241003124114 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, vehicle_name VARCHAR(50) NOT NULL, price DOUBLE PRECISION NOT NULL, image VARCHAR(255) NOT NULL, circulation_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', kilometer INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE opening (id INT AUTO_INCREMENT NOT NULL, ouverture_matin TIME NOT NULL COMMENT \'(DC2Type:time_immutable)\', fermeture_matin TIME NOT NULL COMMENT \'(DC2Type:time_immutable)\', ouverture_midi TIME NOT NULL COMMENT \'(DC2Type:time_immutable)\', fermeture_midi TIME NOT NULL COMMENT \'(DC2Type:time_immutable)\', jour DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rate (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(100) NOT NULL, commentù LONGTEXT DEFAULT NULL, grade INT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE opening');
        $this->addSql('DROP TABLE rate');
    }
}