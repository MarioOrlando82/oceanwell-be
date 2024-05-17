<?php

namespace App\Http\Controllers;

use App\Http\Modules\Article\ArticleService;
use App\Http\Modules\ArticleCategory\ArticleCategoryService;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    private ArticleService $articleService;
    private ArticleCategoryService $articleCategoryService;

    public function __construct(ArticleService $articleService, ArticleCategoryService $articleCategoryService)
    {
        $this->articleService = $articleService;
        $this->articleCategoryService = $articleCategoryService;
    }

    public function index(Request $request)
    {
        $articleCategories = $this->articleCategoryService->getAllArticleCategory();
        $articles = $this->articleService->getAllArticlesWithPagination(5, 'date_desc');
        $articleSpotlight = $this->articleService->getArticleSpotlight();

        if ($request->has('selectedCategory') && $request->selectedCategory != 0) {
            $selectedCategory = $request->selectedCategory;
            $articles = $this->articleService->getArticleByCategoryWithPagination($selectedCategory, 5);
            $articleCategories = $this->articleCategoryService->getAllArticleCategory();
            return view('article.ArticleIndex')->with(compact(['articles', 'articleCategories', 'selectedCategory', 'articleSpotlight']));
        }

        return view('article.ArticleIndex')->with(compact('articles', 'articleCategories', 'articleSpotlight'));
    }

    public function list(Request $request)
    {
        if ($request->has('selectedCategory') && $request->selectedCategory != 0) {
            $selectedCategory = $request->selectedCategory;
            $articles = $this->articleService->getArticleByCategoryWithPagination($selectedCategory, 4);
            $articleCategories = $this->articleCategoryService->getAllArticleCategory();
            return view('article.ArticleList')->with(compact(['articles', 'articleCategories', 'selectedCategory']));
        }

        $articles = $this->articleService->getAllArticlesWithPagination(4);
        $articleCategories = $this->articleCategoryService->getAllArticleCategory();
        return view('article.ArticleList')->with(compact(['articles', 'articleCategories']));
    }

    public function content(Request $request)
    {
        $content = $this->articleService->getArticleById($request->id);
        return view('article.ArticleContent')->with(compact('content'));
    }

    public function create()
    {
        $articleCategories = $this->articleCategoryService->getAllArticleCategory();
        return view('article.ArticleCreate')->with(compact('articleCategories'));
    }

    public function edit(Request $request)
    {
        $article = $this->articleService->getArticleById($request->id);
        $articleCategories = $this->articleCategoryService->getAllArticleCategory();
        return view('article.ArticleEdit')->with(compact(['article', 'articleCategories']));
    }

    public function store(StoreArticleRequest $request)
    {
        $validated = $request->validated();
        $validated['image'] = $this->articleService->storeImageBanner($request->file('image'));

        $response = $this->articleService->storeArticle($validated);

        return
            $response
            ? redirect()->back()->with('success', 'Succesfully Create New Article')
            : redirect()->back()->with('error', 'Oops! Something Went Wrong');
    }

    public function update(UpdateArticleRequest $request)
    {
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $this->articleService->storeImageBanner($request->file('image'));
        }

        $response = $this->articleService->updateArticle($request->id, $validated);

        return
            $response
            ? redirect()->back()->with('success', 'Succesfully Update Article')
            : redirect()->back()->with('error', 'Oops! Something Went Wrong');
    }

    public function delete(Request $request)
    {
        $response = $this->articleService->deleteArticle($request->id);

        return
            $response
            ? redirect()->back()->with('success', 'Succesfully Delete Article')
            : redirect()->back()->with('error', 'Oops! Something Went Wrong');
    }
}
