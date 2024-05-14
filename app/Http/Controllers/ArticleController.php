<?php

namespace App\Http\Controllers;

use App\Http\Modules\Article\ArticleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    private ArticleService $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function index()
    {
        $articles = DB::table('articles')->paginate(4);
        return view('article.ArticleList')->with(['articles' => $articles]);
    }

    public function content(Request $request)
    {
        $content = $this->articleService->getArticleById($request->id);
        dd($request);
        return view('article.ArticleContent')->with(compact('content'));
    }

    public function create(Request $request)
    {
        return view('article.ArticleCreate');
    }
}
