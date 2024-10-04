<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use Faker\Generator;
use App\Entity\Article;
use App\Entity\Rate;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    /**
     * faker
     * @var Generator
     */
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }
    public function load(ObjectManager $manager): void
    {

        for ($i = 0; $i < 50; $i++) {
            $article = new Article();
            $article->setVehicleName($this->faker->word())
                ->setPrice(mt_rand(200, 1000000))
                ->setImage($this->faker->randomElement(['bmw.webp', 'img_voiture1.webp', 'tuture.webp', 'voiture_3d.webp']))
                ->setCirculationDate(new \DateTimeImmutable(sprintf('-%d days', mt_rand(2, 365 * 124))))
                ->setKilometer(mt_rand(10000, 500000));

            $manager->persist($article);
        }


        // Users
        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->setFullName($this->faker->name())
                ->setEmail($this->faker->email())
                ->setRoles(['ROLE_MODÉRATEUR'])
                ->setPlainPassword('password');

            $manager->persist($user);
        }
        $manager->flush();

        $user = new User();
        $user->setFullName("Vincent PARROT")
            ->setEmail("vincent.parrot@gmail.com")
            ->setRoles(['ROLE_ADMINISTRATEUR'])
            ->setPlainPassword('password');

        $manager->persist($user);

        for ($i = 0; $i < 10; $i++) {
            $avis = new Rate();
            $avis->setEmail($this->faker->email())
                ->setcomment($this->faker->text())
                ->setGrade(mt_rand(0, 10))
                ->setName($this->faker->name());

            $manager->persist(object: $avis);

        }
        $manager->flush();
    }
}