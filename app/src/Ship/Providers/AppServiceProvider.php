<?php

namespace LargeLaravel\Ship\Providers;

use Carbon\Carbon;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Cache;
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
        Carbon::setLocale(config('app.locale'));

        // load migrations
        $migrationsDirsList = Cache::get('migrationsDirsList', function () {
            $filesystem = new Filesystem();
            $migrationsDirsList = [];

            foreach ($filesystem->directories(app_path('src/Containers')) as $directory) {
                $migrationsDir = $directory . '/Data/Migrations';
                if (is_dir($migrationsDir)) {
                    $migrationsDirsList[] = $migrationsDir;
                }
            }
            Cache::put('migrationsDirsList', $migrationsDirsList, 120);
            return $migrationsDirsList;
        });

        $this->loadMigrationsFrom($migrationsDirsList);
    }
}
