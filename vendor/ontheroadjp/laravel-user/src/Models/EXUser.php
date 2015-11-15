<?php
namespace Ontheroadjp\LaravelUser\Models;

class ExUser extends \App\User {

	protected $fillable = ['name', 'email', 'password', 'hash'];

}