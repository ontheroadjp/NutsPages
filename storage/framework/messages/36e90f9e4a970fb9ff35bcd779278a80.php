<?php
/*
*
* (c) @ontheroad_jp <dev@ontheroad.jp>
*
*
* For the full copyright and license information, please view the LICENSE.txt
* file that was distributed with this source code.
* 
*/
namespace Ontheroadjp\LaravelImageGallery\Providers;

use Illuminate\Support\ServiceProvider;
use Route;

/**
 * Class LaravelAuthServiceProvider
 * @package Ontheroad\LaravelAuth\Providers
 */
class LaravelImageGalleryServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerRoutes();
        $this->publishViews();
        $this->publishConfig();
    }


    private function registerRoutes()
    {

        Route::get('/imagegallery', ['middleware' => 'auth', function () {
            return view('LaravelImageGellery::imagegallery');
        }]);

        Route::get('/{userId}/collection', ['middleware' => 'auth', function () {
            return view('LaravelImageGellery::collection');
        }]);

        // Define the route
        $routeConfig = [
            'namespace' => 'Ontheroadjp\LaravelImageGallery\Controllers',
        ];

        if($this->app['config']->get('laravel-img-gallery.middleware')) {
            $routeConfig['middleware'] = $this->app['config']->get('laravel-img-gallery.middleware');
        }

        $this->app['router']->group($routeConfig, function($router) {
            $router->any($this->app['config']->get('laravel-img-gallery.route', 'laravel-img-gallery').'/{type?}', [
                'uses' => 'LaravelImageGalleryController@upload',
                'as' => 'laravel-img-gallery',
            ]);
        });

    }

    /**
     * Publish Config file to Laravel project
     *
     * @return void
     */
    private function publishConfig()
    {
        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('laravel-img-gallery.php'),
        ], 'config');

    }

    /**
     * Publish package views to Laravel project
     *
     * @return void
     */
    private function publishViews()
    {
        $this->loadViewsFrom( dirname(__FILE__) . '/../views/', 'LaravelImageGellery');
    }
}
