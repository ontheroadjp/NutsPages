<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_sites', function($table){
            $table->increments('id');
            $table->string('user_hash',40);
            $table->string('site_name');
            $table->string('site_description')->nullable();
            $table->string('site_keywords')->nullable();
            $table->boolean('published')->default(false);
            $table->string('hash',40);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_sites');
    }
}
