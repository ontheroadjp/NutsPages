<?php

namespace Ontheroadjp\LaravelUser\Models;

use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
	protected $table = 'user_activities';
	protected $fillable = ['user_id','activity_id'];

	public static function registered($id){
		static::create(['activity_id'=>'10','user_id'=>$id]);
	}

	public static function logedin($id){
		static::create(['activity_id'=>'20','user_id'=>$id]);
	}

	public static function updatedUserName($id){
		static::create(['activity_id'=>'30','user_id'=>$id]);
	}

	public static function updatedEmailAddress($id){
		static::create(['activity_id'=>'40','user_id'=>$id]);
	}

	public static function updatedPassword($id){
		static::create(['activity_id'=>'50','user_id'=>$id]);
	}
}
?>
