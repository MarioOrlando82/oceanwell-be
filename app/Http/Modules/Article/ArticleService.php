<?php

declare(strict_types=1);

namespace App\Http\Modules\Article;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;

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
}
