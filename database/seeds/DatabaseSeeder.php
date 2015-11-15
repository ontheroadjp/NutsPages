<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

use Ontheroadjp\LaravelUser\database\seeds\ActivityMasterTableSeeder;


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

        $this->call('Ontheroadjp\LaravelUser\database\seeds\ActivityMasterTableSeeder');

        Model::reguard();
    }
}

