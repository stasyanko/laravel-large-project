<?php

namespace LargeLaravel\Ship\Providers;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Cache;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        $isProduction = config('app.env') === 'production';
        $uiRouteProviderList = $this->getUiRouteProviderList($isProduction);

        foreach ($uiRouteProviderList as $uiRouteProvider) {
            $this->app->register($uiRouteProvider);
        }

        $this->app['router']->middleware('web');
    }

    private function getUiRouteProviderList(bool $isProduction): array
    {
        $routeProviderListFunction = function () {
            $uiRouteProviderList = [];
            $filesystem = new Filesystem();

            foreach ($filesystem->directories(app_path('src/Containers')) as $directory) {
                $uiModuleName = last(explode('/', $directory));

                $webRouteProvider = $directory . '/UI/WEB/Routes/RouteProvider.php';
                if (file_exists($webRouteProvider)) {
                    $webProviderClass = 'LargeLaravel\Containers\\' . $uiModuleName . '\UI\WEB\Routes\RouteProvider';
                    $uiRouteProviderList[] = $webProviderClass;
                }

                $apiRouteProvider = $directory . '/UI/API/Routes/RouteProvider.php';
                if (file_exists($apiRouteProvider)) {
                    $apiProviderClass = 'LargeLaravel\Containers\\' . $uiModuleName . '\UI\API\Routes\RouteProvider';
                    $uiRouteProviderList[] = $apiProviderClass;
                }
            }

            return $uiRouteProviderList;
        };

        if($isProduction) {
            $uiRouteProviderList = Cache::get('uiRouteProviderList', function () use($routeProviderListFunction) {
                $uiRouteProviderList = $routeProviderListFunction();
                Cache::put('uiRouteProviderList', $uiRouteProviderList, 60);
                return $uiRouteProviderList;
            });
        } else {
            $uiRouteProviderList = $routeProviderListFunction();
        }

        return $uiRouteProviderList;
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {

    }
}
