<?php

declare(strict_types=1);

namespace App\Http\Modules\Article;

use App\Models\Article;

class ArticleRepository
{
    public function getArticleById(int $id): Article
    {
        return Article::findOrFail($id);
    }
}
