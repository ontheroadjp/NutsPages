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
        $this->publishViews();
        $this->publishLangAssets();

        ExUser::observe(new UserObserver);
        UserActivity::observe(new UserActivityObserver);

        // ---------------------------
        // Eloquoent Model Event Handller
        // ---------------------------
        // 
        // parent::boot($events);
        // User::created(function($user) {
        //     if( $this->createUserDir($user) ) {
        //         // $this->sendWelcomeMail($user);
        //         // return false;
        //     }
        // });

        // User::created(function($user){
        //     $this->sendWelcomeMail($user);
        // });

        // ---------------------------
        // original events
        // ---------------------------
        // 
        //     $user = $event->user;
        //     if( $this->createUserDir($user) ) {
        //         $this->sendWelcomeMail($user);
        //     } else {
        //         // todo:エラーログ出力とか
        //     }
        // });
    }

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

    protected function registerRoutes()
    {

        // Route::controllers([
        // ]);

        Route::get('/home', ['middleware' => 'auth', function () {
            return view('home');
        }]);

        Route::get('/lang/{locale}', function($locale) {
            LaravelGettext::setLocale($locale);
            return redirect(URL::previous());
        });

        // Define the route for auth
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
               Route::get('/', 'UserController@view');               
               Route::post('edit', 'UserController@edit');
               Route::post('changepass', 'PasswordController@changePassword');
            }
        );
    }

    /**
     * Publish package views to Laravel project
     *
     * @return void
     */
    protected function publishViews()
    {
        $this->loadViewsFrom( dirname(__FILE__) . '/../views/', 'LaravelUser');

        $this->publishes([
        //     dirname(__FILE__).'/../views/auth' => base_path('resources/views/auth'),
            dirname(__FILE__).'/../views/emails' => base_path('resources/views/emails'),
            dirname(__FILE__).'/../views/errors' => base_path('resources/views/errors'),
            dirname(__FILE__).'/../views/partials' => base_path('resources/views/partials'),
            dirname(__FILE__).'/../views/nuts-components' => base_path('resources/views/nuts-components'),
            dirname(__FILE__).'/../views/app.blade.php' => base_path('resources/views/app.blade.php'),
            dirname(__FILE__).'/../views/home.blade.php' => base_path('resources/views/home.blade.php'),
            dirname(__FILE__).'/../views/welcome.blade.php' => base_path('resources/views/welcome.blade.php'),
        ]);
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


