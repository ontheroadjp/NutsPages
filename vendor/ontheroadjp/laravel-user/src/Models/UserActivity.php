<?php

namespace Ontheroadjp\LaravelUser\Models;

use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
	protected $table = 'user_activities';
	protected $fillable = ['user_id','activity_id','message'];

	/**
	 * 汎用アクティビティ 
	 * 
	 * @param Integer $id 
	 * @param String $msg 
	 * @static
	 * @access public
	 * @return void
	 */
	public static function action($id, $msg){
		static::create(['activity_id'=>'10','user_id'=>$id,'message'=>$msg]);
	}

	/**
	 * 新規ユーザー登録 
	 * 
	 * @param Integer $id 
	 * @static
	 * @access public
	 * @return void
	 */
	public static function createdUserAccount($id){
		static::create(['activity_id'=>'20','user_id'=>$id,'message'=>'CREATED_USER_ACCOUNT']);
	}

	/**
	 * ログイン 
	 * 
	 * @param Integer $id 
	 * @static
	 * @access public
	 * @return void
	 */
	public static function signedIn($id){
		static::create(['activity_id'=>'10','user_id'=>$id,'message'=>'SIGNED_IN']);
	}

	/**
	 * ユーザー名変更 
	 * 
	 * @param Integer $id 
	 * @static
	 * @access public
	 * @return void
	 */
	public static function updatedUserName($id){
		static::create(['activity_id'=>'10','user_id'=>$id,'message'=>'UPDATED_USER_NAME']);
	}

	/**
	 * Email アドレス変更
	 * 
	 * @param mixed $id 
	 * @static
	 * @access public
	 * @return void
	 */
	public static function updatedEmailAddress($id){
		static::create(['activity_id'=>'10','user_id'=>$id,'message'=>'UPDATED_EMAIL_ADDRESS']);
	}

	// パスワード変更
	public static function changePassword($id){
		static::create(['activity_id'=>'10','user_id'=>$id,'message'=>'CHANGE_PASSWORD']);
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
