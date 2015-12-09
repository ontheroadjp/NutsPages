<?php

namespace Ontheroadjp\Utilities\Test;

use \Mockery as M;

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
        $app = require __DIR__.'/../../../../bootstrap/app.php';
        $app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();
        return $app;
    }

    public function setUp(){
        parent::setUp();
    }

    public function tearDown()
    {
        parent::tearDown();
        M::close();
    }

    public function microtimeFloat()
    {
        list($usec, $asec) = explode(" ", microtime());
        return ((float) $usec + (float) $asec);
    }
}


