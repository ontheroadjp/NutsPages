<?php

namespace Ontheroadjp\LaravelUser\Models;

use Illuminate\Database\Eloquent\Model;

// // ログイン、ユーザー名変更、画像アップロード、画像削除、サイト編集、サイト情報更新
// Activity::create(['id'=>'10', 'activity' => 'ACTION']);

// // アカウント作成
// Activity::create(['id'=>'20', 'activity' => 'CREATED_USER_ACCOUTT']);

// // メールアドレス変更、パスワード変更
// Activity::create(['id'=>'30', 'activity' => 'UPDATED_USER_ACCOUTT']);

// // サイト新規作成
// Activity::create(['id'=>'40', 'activity' => 'CREATED_USER_SITE']);

// // サイト削除
// Activity::create(['id'=>'50', 'activity' => 'DELETED_USER_SITE']);

class UserActivity extends Model
{
	protected $table = 'user_activities';
	protected $fillable = ['user_id','activity_id','message'];

	public static function action($id, $msg){
		static::create(['activity_id'=>'10','user_id'=>$id,'message'=>$msg]);
	}

	public static function createdUserAccount($id, $msg){
		static::create(['activity_id'=>'20','user_id'=>$id,'message'=>$msg]);
	}

	public static function updatedUserAccount($id, $msg){
		static::create(['activity_id'=>'10','user_id'=>$id,'message'=>$msg]);
	}

	public static function createdUserSite($id, $msg){
		static::create(['activity_id'=>'20','user_id'=>$id,'message'=>$msg]);
	}

	public static function updatedUserSite($id, $msg){
		static::create(['activity_id'=>'20','user_id'=>$id,'message'=>$msg]);
	}

	public static function deletedUserSite($id, $msg){
		static::create(['activity_id'=>'20','user_id'=>$id,'message'=>$msg]);
	}

	public static function getHtml($msg){

	}
}
?>
