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
namespace Ontheroadjp\LaravelAuth\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Console\AppNamespaceDetectorTrait;
use Route;
use Ontheroadjp\LaravelAuth\Events\UserWasRegistered;

/**
 * Class LaravelAuthServiceProvider
 * @package Ontheroad\LaravelAuth\Providers
 */
class LaravelAuthServiceProvider extends ServiceProvider
{
    use AppNamespaceDetectorTrait;

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
        $this->publishControllers();
        $this->publishViews();
        $this->publishLangAssets();

        \Event::listen('Ontheroadjp\LaravelAuth\Events\UserWasRegistered', function( UserWasRegistered $event ) {
            $user = $event->user;
            if( $this->createUserDir($user) ) {
                $this->sendWelcomeMail($user);
            } else {
                // todo:エラーログ出力とか
            }
        });
    }

    private function sendWelcomeMail($user)
    {
       \Mail::send('emails.welcome', compact('user'), function($message) use ($user) {
           $message->to($user->email, $user->name)->subject( _('Welcome to the Nuts Pages') );
        }, 10);
    }

    private function createUserDir($user)
    {
        return mkdir(base_path('users').'/'.$user->id);
    }

    private function registerRoutes()
    {

        // Route::controllers([
        //     'auth' => $this->getAppNamespace() . 'Http\Controllers\Auth\AuthController',
        //     'password' => $this->getAppNamespace() . 'Http\Controllers\Auth\PasswordController',
        // ]);
        Route::controllers([
            'auth' => 'Ontheroadjp\LaravelAuth\Controllers\Auth\ExAuthController',
            'password' => 'Ontheroadjp\LaravelAuth\Controllers\Auth\ExPasswordController',
        ]);

        Route::get('/home', ['middleware' => 'auth', function () {
            return view('home');
        }]);

    }

    /**
     * Publish Controllers to Laravel project
     *
     * @return void
     */
    private function publishControllers()
    {
        $this->publishes([
            dirname(__FILE__) . '/../Controllers/auth/ExAuthController.php' => app_path('Http/Controllers/auth/ExAuthController.php'),
            dirname(__FILE__) . '/../Controllers/auth/ExPasswordController.php' => app_path('Http/Controllers/auth/ExPasswordController.php'),
        ]);
    }

    /**
     * Publish package views to Laravel project
     *
     * @return void
     */
    private function publishViews()
    {
        $this->loadViewsFrom( dirname(__FILE__) . '/../views/', 'LaravelAuth');

        $this->publishes([
            dirname(__FILE__).'/../views/auth' => base_path('resources/views/auth'),
            dirname(__FILE__).'/../views/emails' => base_path('resources/views/emails'),
            dirname(__FILE__).'/../views/errors' => base_path('resources/views/errors'),
            dirname(__FILE__).'/../views/partials' => base_path('resources/views/partials'),
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
