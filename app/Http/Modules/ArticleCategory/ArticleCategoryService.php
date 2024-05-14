<?php

declare(strict_types=1);

namespace App\Http\Modules\ArticleCategory;

use App\Models\ArticleCategory;
use Illuminate\Database\Eloquent\Collection;

class ArticleCategoryService
{
    private ArticleCategoryRepository $articleCategoryRepository;

    public function __construct(ArticleCategoryRepository $articleCategoryRepository)
    {
        $this->articleCategoryRepository = $articleCategoryRepository;
    }

    public function getAllArticleCategory(): Collection
    {
        return $this->articleCategoryRepository->getAllArticleCategory();
    }

    public function getArticleCategoryById(int $id): ArticleCategory
    {
        return $this->articleCategoryRepository->getArticleCategoryById($id);
    }
}
