<?php

namespace Ontheroadjp\LaravelUser\database\seeds;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

use Ontheroadjp\LaravelUser\Models\ActivityMaster as Activity;

class ActivityMasterTableSeeder extends Seeder
{
	public function run() {
		DB::table('activity_master')->delete();

		// ログイン、ユーザー名変更、画像アップロード、画像削除、サイト編集、サイト情報更新
		Activity::create(['id'=>'10', 'activity' => 'ACTION']);

		// アカウント作成
		Activity::create(['id'=>'20', 'activity' => 'CREATED_USER_ACCOUTT']);

		// メールアドレス変更、パスワード変更
		Activity::create(['id'=>'30', 'activity' => 'UPDATED_USER_ACCOUTT']);

		// サイト新規作成
		Activity::create(['id'=>'40', 'activity' => 'CREATED_USER_SITE']);

		// サイト削除
		Activity::create(['id'=>'50', 'activity' => 'DELETED_USER_SITE']);

		// $this->command->info('ActivityMaster table seeded!');
	}
}
?>
