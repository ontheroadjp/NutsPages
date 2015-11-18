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

}