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
}
