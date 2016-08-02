<?php

namespace Test\App\Controller;

use App\Controller\DefaultController;
use App\Repository\Contracts\Employment;
use App\Repository\Contracts\Skills;
use Symfony\Component\HttpFoundation\Response;

class DefaultControllerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test It can render a template
     */
    public function it_can_render_a_template()
    {
        $app = $this->createMock(\App::class);
        $app->expects($this->once())
            ->method('render')
            ->will($this->returnValue(new Response));
        $employment = $this->createMock(Employment::class);
        $skills = $this->createMock(Skills::class);

        $defaultController = new DefaultController($app, $employment, $skills);
        $response = $defaultController->render(
            'default.html.twig',
            [
                'positions' => $defaultController->getEmployment()->getPositions(),
                'skills' => $defaultController->getSkills()->getSkills(),
            ]);

        $this->assertInstanceOf(Response::class, $response);
    }
}
