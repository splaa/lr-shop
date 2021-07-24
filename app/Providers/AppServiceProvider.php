<?php

namespace App\Providers;

use App\Http\ViewComposers\RecentPostsComposer;
use App\Models\Book\Post;
use Blade;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Paginator::useBootstrap();
        $this->activeLinks();
        view()->share('recentPost', Post::recent());
        view()->composer(
            'book.partials.sidebar',
            RecentPostsComposer::class
        );
//        view()->composer('book.partials.sidebar', static function (View $view) {
//            $view->with('recentPosts', Post::recent());
//        });

        Blade::directive('ifGuest', function () {
            return "<?php if (auth()->guest()): ?>";
        });
        Blade::directive('newLineToBr', function ($expression) {
            return "<?php echo nl2br($expression); ?>";
        });
//        Blade::directive('ifPublic', function () {
/*            return "<?php if (app('context')->isPublic()): ?>";*/
//        });
        Blade::if('ifPublic', function () {
            return (app('context')->isPublic());
        });
        //ToDo: Eloquent str 109
    }

    public function activeLinks(): void
    {
        \View::composer('layouts.app', function ($view) {
            $view->with('mainLink', request()->is('/') ? 'menu-link__active' : '');
            $view->with(
                'articleLink',
                (request()->is('articles') or request()->is('articles/*'))
                ? 'menu-link__active' : ''
            );
        });
    }
}
