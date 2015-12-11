<?php
namespace Ontheroadjp\LaravelUser\Models;

use App\User;

class ExUser extends User
{
	protected $table = 'users';
	protected $fillable = ['id', 'name', 'email', 'password'];
    public $incrementing = false;

	public function user_sites()
	{
		return $this->hasMany('Ontheroadjp\NutsPages\Models\UserSite');
	}

    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
        if (view()->exists('LaravelUser::auth.authenticate')) {
            return view('LaravelUser::auth.authenticate');
        }

        return view('LaravelUser::auth.login');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister()
    {
        return view('LaravelUser::auth.register');
    }

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEmail()
    {
        return view('LaravelUser::auth.password');
    }

    /**
     * Display the password reset view for the given token.
     *
     * @param  string  $token
     * @return \Illuminate\Http\Response
     */
    public function getReset($token = null)
    {
        if (is_null($token)) {
            throw new NotFoundHttpException;
        }

        return view('LaravelUser::auth.reset')->with('token', $token);
    }
}
