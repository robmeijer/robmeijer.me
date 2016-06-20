<?php

namespace Test\App\Repository;

use App\Repository\ArrayEmployment;

class ArrayEmploymentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \App\Repository\ArrayEmployment
     */
    protected $class;

    /**
     * Setup before each test
     */
    public function setUp()
    {
        $this->class = new ArrayEmployment();
    }

    /**
     * @test It can be initialised
     */
    public function it_can_be_initialised()
    {
        $this->assertInstanceOf(ArrayEmployment::class, $this->class);
    }

    /**
     * @test It can return an array
     */
    public function it_can_return_an_array()
    {
        $this->assertInternalType('array', $this->class->getPositions()->toArray());
    }
}
