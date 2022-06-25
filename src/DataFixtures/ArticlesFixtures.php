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

        for ($i = 0; $i < 20; $i++) {
            $articles = new Articles();
            $articles->setTitle($faker->sentence());
            $articles->setImage($faker->imageUrl());
            $articles->setArticleContent($faker->paragraph(500));
            $articles->setArticleSumary($faker->paragraph());
            $articles->setDate();
            $manager->persist($articles);
        }

        $manager->flush();
    }
}
