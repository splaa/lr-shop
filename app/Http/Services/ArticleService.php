<?php

namespace App\Http\Services;

use App\Models\Article;

class ArticleService
{
    public function getArticleBySlug($request): Article
    {
        $slug = $request->get('slug');
        return Article::findBySlug($slug);
    }
}
