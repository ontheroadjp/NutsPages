<?php

namespace Ontheroadjp\LaravelUser\Controllers\Auth;

// use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
// use Ontheroadjp\LaravelUser\Events\UserWasRegistered;
use Ontheroadjp\LaravelUser\Models\ExUser;
use Ontheroadjp\LaravelUser\Models\UserActivity as Activity;

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
    protected function create(array $data)
    {
        $user = ExUser::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'hash' => sha1(uniqid(rand(),true)),    // 40文字
        ]);

        // $event = app('Illuminate\Contracts\Events\Dispatcher');
        // $event->fire( new UserWasRegistered($user) );
        // \Event::fire(new UserWasRegistered($user));

        return $user;
    }
    
    public function getLogin()
    {
        if (view()->exists('LaravelUser::auth.authenticate')) {
            return view('LaravelUser::auth.authenticate');
        }

        return view('LaravelUser::auth.login');
    }

    public function getRegister()
    {
        return view('LaravelUser::auth.register');
    }

    protected function authenticated($request, $user) {
        Activity::action($user->id, 'SIGNED_IN'); 
        return redirect()->intended($this->redirectPath());
    }

}
