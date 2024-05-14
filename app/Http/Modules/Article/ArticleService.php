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

    public function getAllArticlesWithPagination(int $perPage): LengthAwarePaginator
    {
        return $this->articleRepository->getAllArticlesWithPagination($perPage);
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
}
