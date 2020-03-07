<?php

namespace LargeLaravel\Containers\Book\Providers;

use Illuminate\Support\ServiceProvider;
use LargeLaravel\Containers\Book\Actions\GetBookListAction;
use LargeLaravel\Containers\Book\Proxies\BookEloquentProxy;
use LargeLaravel\Containers\Book\Subactions\Interfaces\GetBookListActionInterface;

class BookServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(GetBookListAction::class, new GetBookListAction(new BookEloquentProxy()));
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
