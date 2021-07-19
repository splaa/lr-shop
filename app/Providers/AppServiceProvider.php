<?php

namespace App\Providers;

use App\Models\Book\Post;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        $this->activeLinks();
        \view()->share('recentPost', Post::recent());
    }

    public function activeLinks()
    {
        View::composer('layouts.app', function ($view){
            $view->with('mainLink', request()->is('/') ? 'menu-link__active' : '');
            $view->with('articleLink',
                (request()->is('articles')or request()->is('articles/*'))
                ? 'menu-link__active' : ''
            );
        });
    }
}
