<?php
namespace Ontheroadjp\LaravelUser\Models;

use App\User;

class ExUser extends User
{
	protected $fillable = ['name', 'email', 'password', 'hash'];

	public function user_sites()
	{
		return $this->hasMany('Ontheroadjp\NutsPages\Models\UserSite');
	}

}