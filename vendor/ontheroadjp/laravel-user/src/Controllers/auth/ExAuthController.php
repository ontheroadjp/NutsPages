<?php

namespace Ontheroadjp\LaravelUser\Controllers\Auth;

use Validator;
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
     protected function validator(array $data)
     {
         return Validator::make($data, [
             'name' => 'required|max:255',
             'email' => 'required|email|max:255|unique:users',
             'password' => 'required|confirmed|min:6',
             'agreement' => 'accepted',
         ]);
     }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return ExUser
     */
    protected function create(array $data)
    {
        $user = ExUser::create([
            'id' => \Uuid::generate(4),
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            // 'hash' => sha1(uniqid(rand(),true)),    // 40文字
        ]);

        return $user;
    }
    
    /**
     * getLogin 
     * 
     * @access public
     * @return void
     */
    public function getLogin()
    {
        if (view()->exists('LaravelUser::auth.authenticate')) 
        {
            return view('LaravelUser::auth.authenticate');
        }

        return view('LaravelUser::auth.login');
    }

    /**
     * getRegister 
     * 
     * @access public
     * @return void
     */
    public function getRegister()
    {
        return view('LaravelUser::auth.register');
    }


    /**
     * authenticated 
     * 
     * @param mixed $request 
     * @param mixed $user 
     * @access protected
     * @return void
     */
    protected function authenticated($request, $user) 
    {
        Activity::signedIn($user->id); 
        return redirect()->intended($this->redirectPath());
    }
}


