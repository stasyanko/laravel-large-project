<?php

namespace LargeLaravel\Containers\Book\UI\API\Routes;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteProvider extends ServiceProvider
{
    public function boot(): void
    {
        Route::group([
            'middleware' => ['web'],
        ], function () {
                $this->bookRoute();
            });
    }

    private function bookRoute(): void
    {
        Route::group([
            'prefix' => '/book/',
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
