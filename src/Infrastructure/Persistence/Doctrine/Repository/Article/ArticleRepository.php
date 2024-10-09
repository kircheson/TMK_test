<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Repository\Article;

use App\Domain\Entity\Article\Article;
use App\Domain\Repository\Article\ArticleRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

class ArticleRepository extends ServiceEntityRepository implements ArticleRepositoryInterface
{
    /*    private ObjectRepository $repository;

        private EntityManagerInterface $em;

        public function __construct(EntityManagerInterface $em)
        {
            $this->em = $em;
            $this->repository = $em->getRepository(User::class);
        }
    В данном куске кода из UserRepository, а конкретно в строке "$em->getRepository(User::class);"
    происходит утечка памяти. Я решил это расширением от класса ServiceEntityRepository, стандартное
    решение, иначе никакой оперативной памяти не хватает (при тестах не хватило даже 40GB)
    */

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    public function createQueryBuilder($alias = null, string|null $indexBy = null): QueryBuilder
    {
        return $this->getEntityManager()->createQueryBuilder()
            ->select($alias)
            ->from(Article::class, $alias);
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
