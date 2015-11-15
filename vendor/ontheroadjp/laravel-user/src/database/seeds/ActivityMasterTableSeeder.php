<?php

namespace Ontheroadjp\NutsPages\seeds;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

use ontheroadjp\NutsPages\Models\ActivityMaster as Activity;

class ActivityMasterTableSeeder extends Seeder
{
	public function run() {
		DB::table('activity_master')->delete();
		Activity::create(['activity' => 'Create New Page']);
		Activity::create(['activity' => 'Update Username']);
		Activity::create(['activity' => 'Update Email Address']);
		Activity::create(['activity' => 'Update Password']);
		$this->command->info('ActivityMaster table seeded!');
	}
}
?>
