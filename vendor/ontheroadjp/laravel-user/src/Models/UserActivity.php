<?php

namespace Ontheroadjp\LaravelUser\Models;

use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
	protected $table = 'user_activities';
	protected $fillable = ['user_id','activity_id','message'];

	// 汎用アクティビティ
	public static function action($id, $msg){
		static::create(['activity_id'=>'10','user_id'=>$id,'message'=>$msg]);
	}

	// 新規ユーザー登録
	public static function createdUserAccount($id){
		static::create(['activity_id'=>'20','user_id'=>$id,'message'=>'CREATED_USER_ACCOUNT']);
	}

	// ログイン
	public static function signedIn($id){
		static::create(['activity_id'=>'10','user_id'=>$id,'message'=>'SIGNED_IN']);
	}

	// ユーザー名変更
	public static function updatedUserName($id){
		static::create(['activity_id'=>'10','user_id'=>$id,'message'=>'UPDATED_USER_NAME']);
	}

	// Email アドレス変更
	public static function updatedEmailAddress($id){
		static::create(['activity_id'=>'10','user_id'=>$id,'message'=>'UPDATED_EMAIL_ADDRESS']);
	}

	// 新規サイト追加
	public static function createdUserSite($id){
		static::create(['activity_id'=>'40','user_id'=>$id,'message'=>'CREATED_USER_SITE']);
	}

	// サイト削除
	public static function deletedUserSite($id){
		static::create(['activity_id'=>'40','user_id'=>$id,'message'=>'DELETED_USER_SITE']);
	}
}
?>
