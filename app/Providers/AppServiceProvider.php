<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            \App\Repositories\Item\ItemRepositoryInterface::class,
            \App\Repositories\Item\ItemRepository::class,
        );
        $this->app->singleton(
            \App\Repositories\Blog\BlogRepositoryInterface::class,
            \App\Repositories\Blog\BlogRepository::class,
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}
