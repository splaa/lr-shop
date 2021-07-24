<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class HomeController
{
    public function index(): Factory|View|Application
    {
        $articles = Article::lastLimit(5);
        return view('app.home', [
            'articles' => $articles
        ]);
    }
}
