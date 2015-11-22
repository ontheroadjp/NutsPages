<?php

namespace Ontheroadjp\NutsPages\Test;

class TestCase extends \Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../../../../../bootstrap/app.php';
        $app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();
        return $app;
    }

    public function setUp(){
        parent::setUp();
        $this->refreshTestDB();
    }

    public function tearDown()
    {
        parent::tearDown();
        // M::close();
    }

    public function refreshTestDB()
    {
        \Config::set('database.default', 'sqlite_test');
        $this->artisan('migrate:refresh');
        $this->seed();
    }

    public function microtimeFloat()
    {
        list($usec, $asec) = explode(" ", microtime());
        return ((float) $usec + (float) $asec);
    }
}


// class TestCase extends \PHPUnit_Framework_TestCase 
// {
     // use ApplicationTrait, AssertionsTrait, CrawlerTrait;
// 
//     public function setUp()
//     {
//         if ( ! $this->app)
//         {
//             $this->refreshApplication();
//         }
//     }
// }