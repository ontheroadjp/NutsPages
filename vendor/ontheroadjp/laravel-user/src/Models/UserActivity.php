<?php

namespace Ontheroadjp\LaravelUser\Models;

use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
	protected $table = 'user_activities';
	protected $fillable = ['user_id','activity_id'];

	public static function logined($id){
		static::create(['activity_id'=>'1','user_id'=>$id]);
	}

	public static function updatedUserName($id){
		static::create(['activity_id'=>'2','user_id'=>$id]);
	}

	public static function updatedEmailAddress($id){
		static::create(['activity_id'=>'3','user_id'=>$id]);
	}

	public static function updatedPassword($id){
		static::create(['activity_id'=>'4','user_id'=>$id]);
	}
}
?>
