<?php


namespace App\Http\Controllers;


use App\Models\Article;

class HomeController
{
    public function index()
    {
        $mainLink = 'http://localhost';
        $articleLink = 'http://localhost';


        $articles = Article::lastLimit(5);
        return view('app.home', [
            'articles' => $articles,
            'mainLink' => $mainLink,
            'articleLink' => $articleLink
        ]);
    }

}
