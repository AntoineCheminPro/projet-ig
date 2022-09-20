<?php

namespace App\DataFixtures;

use App\Entity\Aliment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AlimentsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $aliment = new Aliment();
        $aliment->setLabel();
        $aliment->setCalories();
        $aliment->setJoules();
        $aliment->setCarbohydrate();
        $aliment->setStarch();
        $aliment->setSugars();
        $aliment->setDietaryFibres();
        $aliment->setProteins();
        $aliment->setLipids();
        $aliment->setSaturatedFats();
        $aliment->setOmega3();
        $aliment->setOmega6();
        $aliment->setOmega9();
        $aliment->setWater();
        $aliment->setAshes();
        $aliment->setUser();
        $aliment->setSources();
        $aliment->setDescription();
        $aliment->setGlycemicIndex();
        $aliment->setGlycemicLoad();
        $manager->persist($aliment);

        $manager->flush();
    }
}
