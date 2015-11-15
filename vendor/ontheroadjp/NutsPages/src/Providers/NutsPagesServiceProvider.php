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
        $this->registerRoutes();
        $this->publishViews();
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
               // $router->get('{id}', 'UserController@view');
               // $router->post('editp', 'UserController@hoge');
               Route::get('dashboard', 'NutsPagesController@dashboard');               
               // Route::post('edit', 'UserController@edit');
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



