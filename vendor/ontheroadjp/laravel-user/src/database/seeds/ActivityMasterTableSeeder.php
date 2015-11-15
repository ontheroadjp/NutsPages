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
		Activity::create(['id'=>'1', 'activity' => 'login']);
		Activity::create(['id'=>'2', 'activity' => 'Update Username']);
		Activity::create(['id'=>'3', 'activity' => 'Update Email Address']);
		Activity::create(['id'=>'4', 'activity' => 'Update Password']);
		// $this->command->info('ActivityMaster table seeded!');
	}
}
?>
