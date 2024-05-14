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
        return view('articles.ArticleList')->with(['articles' => $articles]);
    }

    public function content(Request $request)
    {
        $content = $this->articleService->getArticleById($request->id);
        return view('articles.ArticleContent')->with(compact('content'));
    }
}
