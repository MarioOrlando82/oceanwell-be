<?php

declare(strict_types=1);

namespace App\Http\Modules\ArticleCategory;

use App\Models\ArticleCategory;
use Illuminate\Database\Eloquent\Collection;

class ArticleCategoryRepository
{
    public function getAllArticleCategory(): Collection
    {
        return ArticleCategory::all();
    }

    public function getArticleCategoryById(int $id): ArticleCategory
    {
        return ArticleCategory::findOrFail($id);
    }
}
