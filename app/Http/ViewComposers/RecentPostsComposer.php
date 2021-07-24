<?php

namespace App\Http\ViewComposers;

use App\Models\Book\Post;
use Illuminate\Contracts\View\View;

class RecentPostsComposer
{
    public function compose(View $view): void
    {
        $view->with('recentPosts', Post::recent());
    }
}
