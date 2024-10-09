<?php

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
        exit;
        $articles = $articleRepository->findActiveArticles();
        exit;
        return $this->render('article/list.html.twig', [
            'articles' => $articles,
        ]);
    }
}
