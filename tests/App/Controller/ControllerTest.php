<?php

namespace Test\App\Controller;

use App\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ControllerTest
 *
 * @package Test\App\Controller
 */
class ControllerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \App\Controller\Controller
     */
    protected $class;

    /**
     * Setup before each test
     */
    public function setUp()
    {
        $this->class = $this->createMock(Controller::class);
    }

    /**
     * @test It can render a template
     */
    public function it_can_render_a_template()
    {
        $this->class->expects($this->any())
            ->method('render')
            ->will($this->returnValue(new Response));

        $this->assertInstanceOf(Response::class, $this->class->render('test'));
    }
}
