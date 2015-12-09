<?php

namespace Ontheroadjp\NutsPages\Test;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use \Mockery as M;
use Ontheroadjp\LaravelUser\Models\ExUser;
use Ontheroadjp\NutsPages\Models\UserSite;

use Ontheroadjp\Utilities\Test\TestCase;

//use Illuminate\Database\Eloquent\Model;
use Eloquent;

// use tests\helpers\Factory;

class NutsPagesControllerTest extends TestCase
{
    // use DatabaseTransactions;

    public function setUp(){
        parent::setUp();

		// テスト用 DB の初期化
		$this->refreshTestDB();

        // 新規ユーザー作成
        //$this->admin = ExUser::create([
        //    'id' => \Uuid::generate(4),
        //    'name' => 'test',
        //    'email'    => 'test@test.com',
        //    'password' => bcrypt('testtest'),
        //    // 'hash' => sha1(uniqid(rand(),true)),    // 40文字
        //]);

		$user = new ExUser();
		$user->id = \Uuid::generate(4);
		$user->name = 'test';
		$user->email = 'test@test.com';
		$user->password = bcrypt('testtest');
		// $user->hash = sha1(uniqid(rand(),true));
		$this->admin = $user;

		//$this->mock = M::mock('\Ontheroadjp\NutsPages\Models\UserSite');
		//$this->mock = M::mock('UserSite');
//		$mock = M::mock('Eloquent','UserSite');
    }

    private function refreshTestDB()
    {
        \Config::set('database.default', 'sqlite_test');
        $this->artisan('migrate:refresh');
        $this->seed();
    }

	/**
     * A basic functional test example.
     *
     * @return void
     */
    public function testDashboard()
    {
        // アクセスログイン前
        $response = $this->call('GET','/dashboard');
        $this->assertResponseStatus(302,$response->status());

        $this->be($this->admin);

        // アクセスログイン後
        $response = $this->call('GET','dashboard');
        $this->assertResponseStatus(200,$response->status());
	}

	public function testCreate()
	{

        // アクセスログイン前
        $response = $this->call('GET','/site/create');
        $this->assertResponseStatus(302,$response->status());
        // $this->assertEquals('NutsPagesController@create', $response->getContent());

        //$this->be($this->admin);
 
		//$this->mock
		//	->shouldReceive('create')
		//	->once()
		//	->andReturn(true);
			
        // アクセスログイン後
		//$response = $this->action('GET', '\Ontheroadjp\NutsPages\Controllers\NutsPagesController@create', array('site' => $this->mock));
		//$response = $this->call('GET', 'NutsPagesController@create', array('site' => $this->mock));
		//$response = $this->call('GET', 'create');
        //$this->assertResponseStatus(200,$response->status());
    }
}

