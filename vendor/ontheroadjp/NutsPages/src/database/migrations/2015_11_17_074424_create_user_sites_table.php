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
            // $table->increments('id');
            $table->char('id',36);
            $table->primary('id');
            $table->char('user_id',36)->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('site_name');
            $table->string('subdomain',10);
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
