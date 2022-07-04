<?php

namespace App\DataFixtures;

use App\Entity\Articles;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ArticlesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 50; $i++) {
            $articles = new Articles();
            $articles->setTitle($faker->text(80));
            $articles->setImage($faker->imageUrl());
            $articles->setArticleContent($faker->paragraph(500));
            $articles->setArticleSumary($faker->text(360));
            $articles->setDate();
            $manager->persist($articles);
        }

        $manager->flush();
    }
}
