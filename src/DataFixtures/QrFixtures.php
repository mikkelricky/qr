<?php

namespace App\DataFixtures;

use App\Entity\Qr;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class QrFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $qr = (new Qr())
          ->setName('mikkelricky.dk')
          ->setUrl('https://mikkelricky.dk/');
        $manager->persist($qr);

        $manager->flush();
    }
}
