<?php
namespace Ontheroadjp\NutsPages\Test;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use \Mockery as M;

use Ontheroadjp\LaravelUser\Models\ExUser;
use Ontheroadjp\NutsPages\Models\UserSite;
// use Ontheroadjp\NutsPages\Controllers\NutsPagesController as NController;

use Ontheroadjp\NutsPages\Test\TestCase;

// use tests\helpers\Factory;

class NutsServiceProviderTest extends TestCase
{
    // use DatabaseTransactions;

    public function setUp(){
        parent::setUp();

        // 新規ユーザー作成
        $this->admin = ExUser::create([
            'id' => \Uuid::generate(4),
            'name' => 'test',
            'email'    => 'test@test.com',
            'password' => bcrypt('testtest'),
            // 'hash' => sha1(uniqid(rand(),true)),    // 40文字
        ]);
    }

    /**
     * test all route
     *
     * @group route
     * http://laravel-tricks.com/tricks/phpunit-test-all-route-with-get-method-and-no-params
     */

    public function testAllRoute()
    {
        $routeCollection = \Route::getRoutes();
        $this->withoutEvents();
        $blacklist = [
            '_debugbar/open',
            // '_debugbar/clockwork/{id}',
        ];
        $dynamicReg = "/{\\S*}/"; //used for omitting dynamic urls that have {} in uri (http://laravel-tricks.com/tricks/adding-a-sitemap-to-your-laravel-application#comment-1830836789)

        $this->be($this->admin);
        foreach ($routeCollection as $route) {
            if (!preg_match($dynamicReg, $route->getUri()) &&
                in_array('GET', $route->getMethods()) && 
                !in_array($route->getUri(), $blacklist)
            ) {
                $start = $this->microtimeFloat();
                fwrite(STDERR, print_r('test ' . $route->getUri() . "\n", true));
                $response = $this->call('GET', $route->getUri());
                $end   = $this->microtimeFloat();
                $temps = round($end - $start, 3);
                fwrite(STDERR, print_r('time: ' . $temps . "\n", true));
                $this->assertLessThan(15, $temps, "too long time for " . $route->getUri());
                $this->assertEquals(200, $response->getStatusCode(), $route->getUri() . "failed to load");


            }
        }
    }

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testRegisterRoutes()
    {

        // SomeClass クラスのスタブを作成します
        // $stub = $this->getMockBuilder('NutsPagesController')->getMock();
        // $stub = $this->getMock('NutsPagesController',['create'])
        //                 ->expects($this->any())
        //                 ->method('create')
        //                 ->willReturn('NuControtsPagesController@create');
        // $stub->doSomething() をコールすると'foo' を返すようになります
        // $this->assertEquals('NutsPagesController@create', $stub->create());

        // $stub = M::mock('overload:Ontheroadjp\NutsPages\Controllers\NutsPagesController')
        //                 ->shouldAllowMockingProtectedMethods()
        //                 ->shouldReceive('create')
        //                 ->andReturn('NutsPagesController@create')
        //                 ->getMock();


        // アクセスログイン前
        $response = $this->call('GET','/dashboard');
        $this->assertResponseStatus(302,$response->status());
        $response = $this->call('GET','/site/create');
        $this->assertResponseStatus(302,$response->status());
        // $this->assertEquals('NutsPagesController@create', $response->getContent());

        $this->be($this->admin);
 
        // アクセスログイン後
        $response = $this->call('GET','dashboard');
        $this->assertResponseStatus(200,$response->status());

        $response = $this->call('GET','site/create');
        $this->assertResponseStatus(200,$response->status());
    }
}
