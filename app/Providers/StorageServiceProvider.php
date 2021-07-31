<?php

namespace App\Providers;

use App\RepositoryInterface\EloquentPostRepository;
use App\RepositoryInterface\PostRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class StorageServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->app->bind(
            PostRepositoryInterface::class,
            EloquentPostRepository::class
        );
    }


    public function boot(): void
    {
        //
    }
}
