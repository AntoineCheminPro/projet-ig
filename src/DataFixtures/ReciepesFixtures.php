<?php

namespace App\DataFixtures;

use App\Entity\Receipe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ReciepesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $receipe = new Receipe();
        $receipe->setUser();
        $receipe->setContent();
        $receipe->setCookingTime();
        $receipe->setNumberOfPersons();
        $receipe->setSources();

        $manager->persist($receipe);

        $manager->flush();
    }
}
