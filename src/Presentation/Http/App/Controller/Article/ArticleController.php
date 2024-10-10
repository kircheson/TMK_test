<?php

declare(strict_types=1);

namespace App\Presentation\Http\App\Controller\Article;

use App\Infrastructure\Persistence\Doctrine\Repository\Article\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    #[Route('/articles', name: 'article_list')]
    public function list(ArticleRepository $articleRepository): Response
    {
        $articles = $articleRepository->findActiveArticles();
        return $this->render('app/page/article/list.html.twig', [
            'articles' => $articles,
        ]);
    }

    #[Route('/articles/{slug}', name: 'article_show')]
    public function show(string $slug, ArticleRepository $articleRepository): Response
    {
        $article = $articleRepository->findOneBy(['slug' => $slug]);

        if (!$article || !$article->isActive()) {
            throw $this->createNotFoundException('Статья не найдена');
        }

        return $this->render('app/page/article/show.html.twig', [
            'article' => $article,
        ]);
    }
}
