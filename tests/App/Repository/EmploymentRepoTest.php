<?php

namespace Test\App\Repository;

use App\Repository\EmploymentRepo;

class EmploymentRepoTest extends \PHPUnit_Framework_TestCase
{
    protected $class;

    public function setUp()
    {
        $this->class = new EmploymentRepo();
    }

    /**
     * @test It can return an array
     */
    public function it_can_return_an_array()
    {
        $this->assertInternalType('array', (array) $this->class->get());
    }
}
