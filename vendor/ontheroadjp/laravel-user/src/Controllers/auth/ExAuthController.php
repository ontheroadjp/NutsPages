<?php

namespace Ontheroadjp\LaravelUser\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
// use Ontheroadjp\LaravelAuth\Events\UserWasRegistered;

class ExAuthController extends \App\Http\Controllers\Auth\AuthController
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    // use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        // $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => 'required|max:255',
    //         'email' => 'required|email|max:255|unique:users',
    //         'password' => 'required|confirmed|min:6',
    //     ]);
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    // protected function create(array $data)
    // {
    //     $user = User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => bcrypt($data['password']),
    //     ]);

    //     // $event = app('Illuminate\Contracts\Events\Dispatcher');
    //     // $event->fire( new UserWasRegistered($user) );
        
    //     \Event::fire(new UserWasRegistered($user));

    //     return $user;
    // }
    
    public function getLogin()
    {
        if (view()->exists('LaravelAuth::auth.authenticate')) {
            return view('LaravelAuth::auth.authenticate');
        }

        return view('LaravelAuth::auth.login');
    }

    public function getRegister()
    {
        return view('LaravelAuth::auth.register');
    }

    protected function authenticated($request, $user) {
        // activity 追加処理
        return redirect()->intended($this->redirectPath());
    }

}
