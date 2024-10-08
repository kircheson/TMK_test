<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Repository\Article;

use App\Domain\Entity\Article\Article;
use App\Domain\Entity\User\User;
use App\Domain\Repository\Article\ArticleRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;
use DomainException;
use Symfony\Bridge\Doctrine\ManagerRegistry;

class ArticleRepository implements ArticleRepositoryInterface
{
    private ObjectRepository $repository;

    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->repository = $em->getRepository(User::class);
    }

    public function findActiveArticles(): array
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.active = :active')
            ->setParameter('active', true)
            ->orderBy('a.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findBySlug(string $slug): Article
    {
        // TODO: Implement findBySlug() method.
    }

    public function save(Article $article): void
    {
        // TODO: Implement save() method.
    }

    public function delete(Article $article): void
    {
        // TODO: Implement delete() method.
    }
}
