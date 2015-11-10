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
namespace Ontheroadjp\LaravelUser\Providers;

use Route;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\URL;
use Xinax\LaravelGettext\Facades\LaravelGettext;

/**
 * Class LaravelAuthServiceProvider
 * @package Ontheroad\LaravelAuth\Providers
 */
class LaravelUserServiceProvider extends ServiceProvider
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
        Route::get('/lang/{locale}', function($locale) {
            LaravelGettext::setLocale($locale);
            // return $req->redirect()->to(URL::previous());
            return redirect(URL::previous());
        });


        // Define the route
        $routeConfig = [
            'namespace' => 'Ontheroadjp\LaravelUser\Controllers',
            'prefix' => 'profile',
            'middleware' => 'auth',
            'where' => ['id' => '[0-9]+'],
        ];

        $this->app['router']->group($routeConfig, function() {
               // $router->get('{id}', 'UserController@view');
               // $router->post('editp', 'UserController@hoge');
               Route::get('/', 'UserController@view');               
               Route::post('edit', 'UserController@edit');
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
        $this->loadViewsFrom( dirname(__FILE__) . '/../views/', 'LaravelUser');
    }
}



