<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

use Ontheroadjp\NutsPages\Models\ActivityMaster as Activity;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('ActivityMasterTableSeeder');

        Model::reguard();
    }
}

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

