<?php

namespace App\DataFixtures;

use App\Entity\AdresseFormation;
use App\Entity\Depots;
use App\Entity\Formation;
use App\Entity\Materielles;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        // Ajouter des utilisateurs
        for ($i = 0; $i < 5; $i++) {
            $user = new User();
            $user->setEmail($faker->email)
                ->setNom($faker->lastName)
                ->setPrenom($faker->firstName)
                ->setGain($faker->randomFloat(2, 100, 1000))
                ->setPassword($this->passwordHasher->hashPassword($user, 'password'));

            $manager->persist($user);

            // Ajouter des matériels pour chaque utilisateur
            for ($j = 0; $j < 3; $j++) {
                $materielle = new Materielles();
                $materielle->setTypes($faker->randomElement(['Ordinateur', 'Téléphone', 'Tablette']))
                    ->setEtat($faker->randomElement(['Neuf', 'Usagé', 'Cassé']))
                    ->setModele($faker->word)
                    ->setPrix($faker->randomFloat(2, 50, 2000))
                    ->setStatut($faker->randomElement(['Disponible', 'En cours', 'Vendu']))
                    ->setUser($user);

                $manager->persist($materielle);
            }
        }

        // Ajouter des adresses de formation
        for ($i = 0; $i < 3; $i++) {
            $adresseFormation = new AdresseFormation();
            $adresseFormation->setNom($faker->company)
                ->setAdresse($faker->address)
                ->setLatitude($faker->latitude(-90, 90))
                ->setLongitude($faker->longitude(-99, 99));

            $manager->persist($adresseFormation);

            // Ajouter des formations pour chaque adresse
            for ($j = 0; $j < 2; $j++) {
                $formation = new Formation();
                $formation->setNom($faker->word)
                    ->setDescription($faker->sentence)
                    ->setUrl($faker->url)
                    ->setAdresseFormation($adresseFormation);

                $manager->persist($formation);
            }
        }

        // Ajouter des dépôts
        for ($i = 0; $i < 4; $i++) {
            $depot = new Depots();
            $depot->setNom($faker->company)
                ->setAdresse($faker->address)
                ->setLatitude($faker->latitude(-90, 90))
                ->setLongitude($faker->longitude(-90, 90));

            $manager->persist($depot);
        }

        $manager->flush();
    }
}
