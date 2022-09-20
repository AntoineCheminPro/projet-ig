<?php

namespace App\DataFixtures;

use App\Entity\Aliment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AlimentsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $aliment = new Aliment();
        // $aliment->setLabel();
        // $aliment->setJoules();
        // $aliment->setCalories();
        // $aliment->setCarbohydrate();
        // $aliment->setStarch();
        // $aliment->setSugars();
        // $aliment->setDietaryFibres();
        // $aliment->setProteins();
        // $aliment->setLipids();
        // $aliment->setSaturatedFats();
        // $aliment->setOmega3();
        // $aliment->setOmega6();
        // $aliment->setOmega9();
        // $aliment->setWater();
        // $aliment->setAshes();
        // $aliment->setUser();
        // $aliment->setSources();
        // $aliment->setDescription();
        // $aliment->setGlycemicIndex();
        // $aliment->setGlycemicLoad();
        // $manager->persist($aliment);

        $carotteCrue = new Aliment();
        $carotteCrue->setLabel('carotte crue');
        $carotteCrue->setJoules(109);
        $carotteCrue->setCalories(26);
        $carotteCrue->setCarbohydrate(4.8);
        $carotteCrue->setStarch(0);
        $carotteCrue->setSugars(4.8);
        $carotteCrue->setDietaryFibres(3.63);
        $carotteCrue->setProteins(0.98);
        $carotteCrue->setLipids(0.2);
        $carotteCrue->setSaturatedFats(0.0385);
        $carotteCrue->setOmega3(0.012);
        $carotteCrue->setOmega6(0.105);
        $carotteCrue->setOmega9(0.0038);
        $carotteCrue->setWater(88.2);
        $carotteCrue->setAshes(0.86);
        $carotteCrue->setUser();
        $carotteCrue->setSources('https://fr.wikipedia.org/wiki/Carotte');
        $carotteCrue->setDescription(
            "La Carotte (Daucus carota subsp. sativus) est une plante bisannuelle de la famille des Apiacées (aussi appelées Ombellifères), largement cultivée pour sa racine pivotante charnue, comestible, de couleur généralement orangée, consommée comme légume. La carotte représente, après la pomme de terre, le principal légume-racine cultivé dans le monde2. C'est une racine riche en carotène."
        );
        $carotteCrue->setGlycemicIndex(35);
        $cg = (35 * 4.8) / 100;
        $carotteCrue->setGlycemicLoad($cg);
        $manager->persist($carotteCrue);

        $carotteCuite = new Aliment();
        $carotteCuite->setLabel('carotte cuite');
        $carotteCuite->setJoules(109);
        $carotteCuite->setCalories(26);
        $carotteCuite->setCarbohydrate(4.8);
        $carotteCuite->setStarch(0);
        $carotteCuite->setSugars(4.8);
        $carotteCuite->setDietaryFibres(3.63);
        $carotteCuite->setProteins(0.98);
        $carotteCuite->setLipids(0.2);
        $carotteCuite->setSaturatedFats(0.0385);
        $carotteCuite->setOmega3(0.012);
        $carotteCuite->setOmega6(0.105);
        $carotteCuite->setOmega9(0.0038);
        $carotteCuite->setWater(88.2);
        $carotteCuite->setAshes(0.86);
        $carotteCuite->setUser();
        $carotteCuite->setSources('https://fr.wikipedia.org/wiki/Carotte');
        $carotteCuite->setDescription(
            "La Carotte (Daucus carota subsp. sativus) est une plante bisannuelle de la famille des Apiacées (aussi appelées Ombellifères), largement cultivée pour sa racine pivotante charnue, comestible, de couleur généralement orangée, consommée comme légume. La carotte représente, après la pomme de terre, le principal légume-racine cultivé dans le monde2. C'est une racine riche en carotène."
        );
        $carotteCuite->setGlycemicIndex(70);
        $cg2 = (70 * 4.8) / 100;
        $carotteCuite->setGlycemicLoad($cg2);
        $manager->persist($carotteCuite);
        $manager->flush();
    }
}
