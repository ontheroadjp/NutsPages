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

// use App\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Console\AppNamespaceDetectorTrait;
use Route;

// use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;

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
class LaravelUserServiceProvider extends ServiceProvider

{
    // use AppNamespaceDetectorTrait;

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
        // $this->app->bind('ExUser', function($app) {
        //     return new ExUser();
        // });
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    // public function boot(DispatcherContract $events)
    public function boot()
    {
        $this->publishMigrationsAndSeeds();
        $this->registerRoutes();
        $this->registerEventListeners();
        $this->publishViews();
    }

    /**
     * registerRoutes 
     * 
     * @access protected
     * @return void
     */
    protected function registerRoutes()
    {
        // Define the route
        $routeConfig = [
            'namespace' => 'Ontheroadjp\LaravelUser\Controllers\auth',
        ];

        $this->app['router']->group($routeConfig, function($router) {
            $router->controllers([
                'auth' => 'ExAuthController',
                'password' => 'ExPasswordController',
            ]);
        });

        // Define the route
        $routeConfig = [
            'namespace' => 'Ontheroadjp\LaravelUser\Controllers',
            'prefix' => 'profile',
            'middleware' => 'auth',
            'where' => ['id' => '[0-9]+'],
        ];

        $this->app['router']->group($routeConfig, function() {
               Route::get('/', 'UserController@index');               
               Route::post('edit', 'UserController@edit');
               Route::post('changepass', 'PasswordController@changePassword');
            }
        );
    }

    /**
     * registerEventListeners 
     * 
     * @access protected
     * @return void
     */
    protected function registerEventListeners()
    {
        //ExUser::observe(new UserObserver);
        //UserActivity::observe(new UserActivityObserver);
        ExUser::observe(new UserObserver);
    }

    /**
     * publishMigrationsAndSeeds 
     * 
     * @access protected
     * @return void
     */
    protected function publishMigrationsAndSeeds() {

        $mig = [
            'src' => '/../database/migrations/',
            'dist' => 'database/migrations/'
        ];

        // Migration
        $this->publishes([

            // users
            dirname(__FILE__).$mig['src'].'2014_10_12_000000_create_users_table.php' 
                => base_path($mig['dist'].'2014_10_12_000000_create_users_table.php'),

            // password_resets
            dirname(__FILE__).$mig['src'].'2014_10_12_100000_create_password_resets_table.php' 
                => base_path($mig['dist'].'2014_10_12_100000_create_password_resets_table.php'),

            // activity_master
            dirname(__FILE__).$mig['src'].'2015_11_14_043725_create_activity_master_table.php' 
                => base_path($mig['dist'].'2015_11_14_043725_create_activity_master_table.php'),

            // user_activities
            dirname(__FILE__).$mig['src'].'2015_11_14_042625_create_user_activities_table.php' 
                => base_path($mig['dist'].'2015_11_14_042625_create_user_activities_table.php'),
        ]);
    }

    /**
     * Publish package views to Laravel project
     *
     * @return void
     */
    protected function publishViews()
    {
        $this->loadViewsFrom( dirname(__FILE__) . '/../views/', 'LaravelUser');
    }
}


