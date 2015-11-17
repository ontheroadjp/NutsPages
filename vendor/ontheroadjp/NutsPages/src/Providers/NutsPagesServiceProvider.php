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
namespace Ontheroadjp\NutsPages\Providers;

use Route;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\URL;
use Xinax\LaravelGettext\Facades\LaravelGettext;

/**
 * Class LaravelAuthServiceProvider
 * @package Ontheroad\LaravelAuth\Providers
 */
class NutsPagesServiceProvider extends ServiceProvider
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
        $this->publishMigrations();
        $this->registerRoutes();
        $this->publishViews();
    }

    private function publishMigrations()
    {
        $this->publishes([
            dirname(__FILE__).'/../database/migrations/2015_11_17_074424_create_user_sites_table.php' 
                => base_path('database/migrations/2015_11_17_074424_create_user_sites_table.php'),
        ]);
    }

    private function registerRoutes()
    {
        // Define the route
        $routeConfig = [
            'namespace' => 'Ontheroadjp\NutsPages\Controllers',
            'prefix' => '/',
            'middleware' => 'auth',
            'where' => ['id' => '[0-9]+'],
        ];

        $this->app['router']->group($routeConfig, function() {
               Route::get('dashboard', 'NutsPagesController@dashboard');               
               Route::get('create', 'NutsPagesController@create');               
            }
        );

    }

    /**
     * Publish package views to Laravel project
     *
     * @return void
     */
    private function publishViews()
    {
        $this->loadViewsFrom( dirname(__FILE__) . '/../views/', 'NutsPages');
    }
}



