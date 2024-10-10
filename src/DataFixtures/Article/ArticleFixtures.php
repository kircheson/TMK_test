<?php

namespace App\DataFixtures\Article;

use App\Domain\Entity\Article\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $articles = [
            [
                'title' => 'Первая статья',
                'slug' => 'pervaya-statiya',
                'active' => true,
                'views' => 50000,
                'description' => 'Описание первой статьи',
            ],
            [
                'title' => 'Вторая статья',
                'slug' => 'vtoraya-statiya',
                'active' => true,
                'views' => 0,
                'description' => 'Описание второй статьи',
            ],
            [
                'title' => 'Третья статья',
                'slug' => 'tretya-statiya',
                'active' => true,
                'views' => 0,
                'description' => 'Описание третьей статьи',
            ],
        ];

        foreach ($articles as $articleData) {
            $article = new Article();
            $article->setTitle($articleData['title']);
            $article->setSlug($articleData['slug']);
            $article->setActive($articleData['active']);
            $article->setViews($articleData['views']);
            $article->setDescription($articleData['description']);
            $manager->persist($article);
        }

        $manager->flush();
    }
}
