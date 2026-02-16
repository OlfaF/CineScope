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
        $titres = [
            'Inception',
            'Interstellar',
            'The Dark Knight',
            'Tenet',
            'Avatar',
            'Gladiator',
            'The Matrix',
            'Fight Club',
            'The Godfather',
            'Joker',
            'Parasite',
            'Whiplash',
            'Dune',
            'The Prestige',
            'Memento',
            'The Wolf of Wall Street',
            'Mad Max Fury Road',
            'Blade Runner 2049',
            'The Social Network',
            'Shutter Island'
        ];

        $plateformes = [
            $this->getReference(PlatformeFixtures::NETFLIX_REFERENCE, Platforme::class),
            $this->getReference(PlatformeFixtures::PRIME_REFERENCE, Platforme::class),
        ];

        foreach ($titres as $index => $titre) {
            $film = new Film();
            $film->setTitle($titre);
            $film->setSynopsis('Synopsis du film ' . $titre . '. Une histoire captivante.');
            $film->setReleaseYear(rand(1990, 2023));

            shuffle($plateformes);
            $film->addPlatforme($plateformes[0]);

            if (rand(0, 1)) {
                $film->addPlatforme($plateformes[1]);
            }

            $manager->persist($film);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            PlatformeFixtures::class,
        ];
    }
}
