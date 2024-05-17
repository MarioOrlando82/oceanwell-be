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

    public function getAllArticles(?int $limit = null): Collection
    {
        if ($limit) {
            return Article::limit($limit)->get();
        }
        return Article::all();
    }

    public function getAllArticlesWithPagination(int $perPage, ?string $sort = null): LengthAwarePaginator
    {
        if ($sort) {
            return Article::orderBy('created_at', $sort)->paginate($perPage);
        }
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

    public function getArticleByCategoryWithPagination(int $articleCategoryId, int $perPage, ?string $sorted = null): LengthAwarePaginator
    {
        if ($sorted) {
            return Article::where('article_category_id', $articleCategoryId)->orderBy('created_at', $sorted)->paginate($perPage);
        }
        return Article::where('article_category_id', $articleCategoryId)->paginate($perPage);
    }

    public function getArticlesByDateRange(string $startDate, string $endDate): Collection
    {
        return Article::whereBetween('created_at', [$startDate, $endDate])->get();
    }
}
