<?php

namespace Test;

use App;

/**
 * Class AppTest
 *
 * @package Test
 */
class AppTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \App
     */
    protected $app;

    /**
     * Setup before each test
     */
    public function setUp()
    {
        $this->app = require_once __DIR__ . '/../../bootstrap/app.php';
    }

    /**
     * @test It can be initialised
     */
    public function it_can_be_initialised()
    {
        $this->assertInstanceOf(App::class, $this->app);
    }
}
