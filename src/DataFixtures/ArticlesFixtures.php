<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArticlesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $article = new Article();
        $article->setTitle();
        $article->setSubject();
        $article->setContent();
        $article->setSources();
        $article->setUser();
        $manager->persist($article);

        $manager->flush();
    }
}
