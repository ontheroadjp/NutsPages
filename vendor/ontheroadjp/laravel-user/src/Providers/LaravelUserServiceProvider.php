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

use App\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Console\AppNamespaceDetectorTrait;
use Route;

// use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;

use Illuminate\Support\Facades\URL;
use Xinax\LaravelGettext\Facades\LaravelGettext;

use Ontheroadjp\LaravelUser\Listeners\UserModelEventObserver;

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

        User::observe(new UserModelEventObserver);

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

    // private function sendWelcomeMail($user)
    // {
    //    \Mail::send('emails.welcome', compact('user'), function($message) use ($user) {
    //        $message->to($user->email, $user->name)->subject( _('Welcome to the Nuts Pages') );
    //     }, 10);
    // }

    // private function createUserDir($user)
    // {
    //     return mkdir(base_path('users').'/'.$user->id);
    // }

    private function publishMigrationsAndSeeds() {

        $src = [
            'migration' => '/../database/migrations/',
            'seed' => '/../database/seeds/'
        ];

        // Migration
        $this->publishes([
            dirname(__FILE__).$src['migration'].'2015_11_14_043725_create_activity_master_table.php' => base_path('database/migrations/2015_11_14_043725_create_activity_master_table.php'),
            dirname(__FILE__).$src['migration'].'2015_11_14_042625_create_user_activities_table.php' => base_path('database/migrations/2015_11_14_042625_create_user_activities_table.php'),
        ]);

        // Seeds
        // $this->publishes([
        //     dirname(__FILE__).$src['seed'].'ActivityMasterTableSeeder.php' => base_path('database/seeds/ActivityMasterTableSeeder.php'),
        // ]);

    }

    private function registerRoutes()
    {

        // Route::controllers([
        // ]);

        Route::get('/home', ['middleware' => 'auth', function () {
            return view('home');
        }]);

        Route::get('/lang/{locale}', function($locale) {
            LaravelGettext::setLocale($locale);
            // return $req->redirect()->to(URL::previous());
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
                // 'auth' => '\App\Http\Controllers\Auth\AuthController',
                // 'password' => '\App\Http\Controllers\Auth\PasswordController',
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
    private function publishLangAssets()
    {
        $this->publishes([
            dirname(__FILE__) . '/../lang/i18n' => base_path('resources/lang/i18n'),
            dirname(__FILE__) . '/../lang/ja' => base_path('resources/lang/ja'),
        ]);
    }

}
