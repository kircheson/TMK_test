<?php

declare(strict_types=1);

namespace App\Domain\Repository\Article;

use App\Domain\Entity\Article\Article;
use DomainException;

interface ArticleRepositoryInterface
{
    /**
     * Найти активные статьи
     *
     * @return Article[]
     */
    public function findActiveArticles(): array;

    /**
     * Найти статью по уникальному символьному коду (slug)
     *
     * @param string $slug
     *
     * @return Article
     *
     * @throws DomainException
     */
    public function findBySlug(string $slug): Article;

    /**
     * Сохранить статью
     *
     * @param Article $article
     *
     * @return void
     */
    public function save(Article $article): void;

    /**
     * Удалить статью
     *
     * @param Article $article
     *
     * @return void
     */
    public function delete(Article $article): void;
}
