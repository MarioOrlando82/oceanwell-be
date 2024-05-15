<?php

declare(strict_types=1);

namespace App\Http\Modules\Article;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleRepository
{
    public function getArticleById(int $id): Article
    {
        return Article::findOrFail($id);
    }

    public function getAllArticles(): Collection
    {
        return Article::all();
    }

    public function getAllArticlesWithPagination(int $perPage): LengthAwarePaginator
    {
        return Article::paginate($perPage);
    }

    public function storeArticle(array $data): Article
    {
        return Article::create($data);
    }

    public function updateArticle(int $id, array $data): bool
    {
        return Article::findOrFail($id)->update($data);
    }

    public function deleteArticle(int $id): bool
    {
        return Article::findOrFail($id)->delete();
    }

    public function getArticleByCategoryWithPagination(int $articleCategoryId, int $perPage): LengthAwarePaginator
    {
        return Article::where('article_category_id', $articleCategoryId)->paginate($perPage);
    }
}
