<?php

namespace LargeLaravel\Containers\Book\UI\API\Routes;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use LargeLaravel\Containers\Book\UI\API\Controllers\BookController;

class RouteProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->bookRoute();
    }

    private function bookRoute(): void
    {
        Route::group([
            'prefix' => 'api/book/',
        ], function () {
            Route::get(
                '',
                [
                    'as' => 'api_book_list',
                    'uses' => BookController::class . '@list',
                ]
            );
        });
    }
}
