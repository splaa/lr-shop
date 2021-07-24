<?php

namespace App\Http\Controllers;

use App\Models\Article;

class HomeController
{
    public function index()
    {
        $articles = Article::lastLimit(5);
        return view('app.home', [
            'articles' => $articles
        ]);
    }
}
