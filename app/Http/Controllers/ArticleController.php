<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function content(Request $request)
    {
        return view('articles.ArticleContent', ['id' => $request->id]);
    }
}
