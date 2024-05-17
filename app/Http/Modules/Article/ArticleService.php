<?php

declare(strict_types=1);

namespace App\Http\Modules\Article;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile as HttpUploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleService
{
    private ArticleRepository $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function getArticleById(int $id): Article
    {
        return $this->articleRepository->getArticleById($id);
    }

    public function getAllArticles(): Collection
    {
        return $this->articleRepository->getAllArticles();
    }

    public function getAllArticlesWithPagination(int $perPage, ?string $sorted = null): LengthAwarePaginator
    {
        switch ($sorted) {
            case 'date_asc':
                return $this->articleRepository->getAllArticlesWithPagination($perPage, 'asc');
            case 'date_desc':
                return $this->articleRepository->getAllArticlesWithPagination($perPage, 'desc');
            default:
                return $this->articleRepository->getAllArticlesWithPagination($perPage);
        }
    }

    public function storeImageBanner(HttpUploadedFile $file): string
    {
        $filepath = $file->getClientOriginalName();

        $originName = pathinfo($filepath, PATHINFO_FILENAME);
        $extension = pathinfo($filepath, PATHINFO_EXTENSION);
        $filename = $originName . '_' . time() . '.' . $extension;
        $file->move(public_path('Aset/Article'), $filename);

        return $filename;
    }

    public function storeArticle(array $data): Article
    {
        return $this->articleRepository->storeArticle($data);
    }

    public function updateArticle(int $id, array $data): bool
    {
        return $this->articleRepository->updateArticle($id, $data);
    }

    public function deleteArticle(int $id): bool
    {
        return $this->articleRepository->deleteArticle($id);
    }

    public function getArticleByCategoryWithPagination(int $articleCategoryId, int $perPage, ?string $sorted = null): LengthAwarePaginator
    {
        if ($sorted) {
            return $this->articleRepository->getArticleByCategoryWithPagination($articleCategoryId, $perPage, $sorted);
        }
        return $this->articleRepository->getArticleByCategoryWithPagination($articleCategoryId, $perPage);
    }

    public function getArticleSpotlight(): Article
    {
        // get articles from 1 week ago
        $articles = $this->articleRepository->getArticlesByDateRange(now()->subWeek()->format("Y-m-d"), now()->addDay()->format("Y-m-d"));
        if ($articles->isEmpty()) {
            dd('empty');
            // get articles from 1 month ago
            $articles = $this->articleRepository->getArticlesByDateRange(now()->subMonth()->format("Y-m-d"), now()->addDay()->format("Y-m-d"));
        }
        if ($articles->isEmpty()) {
            // get articles from 1 year ago
            $articles = $this->articleRepository->getArticlesByDateRange(now()->subYear()->format("Y-m-d"), now()->addDay()->format("Y-m-d"));
        }
        if ($articles->isEmpty()) {
            // get all articles
            $articles = $this->articleRepository->getAllArticles(5);
        }
        return $articles->random();
    }
}
