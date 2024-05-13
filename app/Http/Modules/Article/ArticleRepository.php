<?php

declare(strict_types=1);

namespace App\Http\Modules\Article;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;

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
}
