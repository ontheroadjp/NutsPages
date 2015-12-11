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

namespace Ontheroadjp\LaravelAppBase\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\URL;
use Xinax\LaravelGettext\Facades\LaravelGettext;

use Ontheroadjp\LaravelUser\Listeners\UserObserver;

use Ontheroadjp\LaravelUser\Models\ExUser;
use Ontheroadjp\LaravelUser\Models\UserActivity;
use Ontheroadjp\LaravelUser\Listeners\UserActivityObserver;


/**
 * Class LaravelUserServiceProvider
 * @package Ontheroad\LaravelUser\Providers
 */
class LaravelAppBaseServiceProvider extends ServiceProvider

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
        $this->app->singleton(
        	Illuminate\Contracts\Debug\ExceptionHandler::class,                
 			Ontheroadjp\LaravelAppBase\Exceptions\Handler::class
 		);
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    // public function boot(DispatcherContract $events)
    public function boot()
    {
        $this->registerRoutes();
        $this->publishViews();
        // $this->publishLangAssets();
    }


    protected function registerRoutes()
    {
        \Route::get('/', function () {
            return view('LaravelAppBase::welcome');
        });

        \Route::get('/home', ['middleware' => 'auth', function () {
            return view('LaravelAppBase::home');
        }]);

        \Route::get('/lang/{locale}', function($locale) {
            LaravelGettext::setLocale($locale);
            return redirect(URL::previous());
        });
    }

    /**
     * Publish package views to Laravel project
     *
     * @return void
     */
    protected function publishViews()
    {
        $this->loadViewsFrom( dirname(__FILE__) . '/../views/', 'LaravelAppBase');
    }

    /**
     * Publish lang assets to Laravel project
     *
     * @return void
     */
    protected function publishLangAssets()
    {
        $this->publishes([
            dirname(__FILE__) . '/../lang/i18n' => base_path('resources/lang/i18n'),
            dirname(__FILE__) . '/../lang/ja' => base_path('resources/lang/ja'),
        ]);
    }
}


