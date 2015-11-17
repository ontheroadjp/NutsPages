<?php

namespace Ontheroadjp\NutsPages\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


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

class UserSite extends Model
{
	protected $table = 'user_sites';
	protected $fillable = ['user_hash','subdomain','site_name','site_description','site_keywords','published','hash'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function user()
    {
		return $this->belongsTo('Ontheroadjp\LaravelUser\Models\User', 'user_hash', 'hash');
	}

}
?>
