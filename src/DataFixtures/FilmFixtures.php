<?php

namespace App\DataFixtures;

use App\Entity\Film;
use App\Entity\Platforme;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class FilmFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $film1 = new Film();
        $film1->setTitle('Inception');
        $film1->setSynopsis('Un film incroyable sur les rêves.');
        $film1->setReleaseYear(2010);
        $film1->addPlatforme(
            $this->getReference(PlatformeFixtures::NETFLIX_REFERENCE, Platforme::class)
        );

        $manager->persist($film1);

        $film2 = new Film();
        $film2->setTitle('Interstellar');
        $film2->setSynopsis('Un voyage spatial fascinant.');
        $film2->setReleaseYear(2014);
        $film2->addPlatforme(
            $this->getReference(PlatformeFixtures::PRIME_REFERENCE, Platforme::class)
        );

        $manager->persist($film2);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            PlatformeFixtures::class,
        ];
    }
}
