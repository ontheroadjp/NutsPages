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
		Activity::create(['id'=>'10', 'activity' => 'Register User Account']);
		Activity::create(['id'=>'20', 'activity' => 'login']);
		Activity::create(['id'=>'30', 'activity' => 'Update Username']);
		Activity::create(['id'=>'40', 'activity' => 'Update Email Address']);
		Activity::create(['id'=>'50', 'activity' => 'Update Password']);
		// $this->command->info('ActivityMaster table seeded!');
	}
}
?>
