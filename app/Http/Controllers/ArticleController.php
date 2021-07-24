<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ArticleController extends Controller
{
    public function index(): Factory|View|Application
    {
        $articles = Article::allPaginate(10);
        return view('app.article.index', compact('articles'));
    }

    public function show($slug): Factory|View|Application
    {
        $article = Article::findBySlug($slug);
        return view('app.article.show', compact('article'));
    }

    public function allByTag(Tag $tag): Application|Factory|View
    {
        $articles = $tag->articles;
        return view('app.article.byTag', compact('articles'));
    }
}
