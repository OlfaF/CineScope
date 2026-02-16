<?php

namespace App\DataFixtures;

use App\Entity\Platforme;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PlatformeFixtures extends Fixture
{
    public const NETFLIX_REFERENCE = 'platforme_netflix';
    public const PRIME_REFERENCE = 'platforme_prime';

    public function load(ObjectManager $manager): void
    {
        $netflix = new Platforme();
        $netflix->setName('Netflix');
        $netflix->setUrl('https://netflix.com');
        $netflix->setLogo('netflix.png');

        $manager->persist($netflix);

        $prime = new Platforme();
        $prime->setName('Prime Video');
        $prime->setUrl('https://primevideo.com');
        $prime->setLogo('prime.png');

        $manager->persist($prime);

        $manager->flush();

        $this->addReference(self::NETFLIX_REFERENCE, $netflix);
        $this->addReference(self::PRIME_REFERENCE, $prime);
    }
}
