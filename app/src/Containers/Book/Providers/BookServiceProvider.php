<?php

namespace LargeLaravel\Containers\Book\Providers;

use Illuminate\Support\ServiceProvider;
use LargeLaravel\Containers\Book\Actions\Decorators\GetBookListActionLogger;
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
        $bookListAction = new GetBookListAction(new BookEloquentProxy());
        $bookListActionLogged = new GetBookListActionLogger($bookListAction);

        $this->app->bind(GetBookListActionInterface::class, function ($app) use($bookListActionLogged) {
            return $bookListActionLogged;
        });
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
