<?php

namespace Test\App\Controller;

use App\Controller\DefaultController;
use App\Repository\EmploymentRepo;
use App\Repository\SkillsRepo;
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
        $employmentRepo = $this->createMock(EmploymentRepo::class);
        $skillsRepo = $this->createMock(SkillsRepo::class);

        $defaultController = new DefaultController($app, $employmentRepo, $skillsRepo);
        $response = $defaultController->render(
            'default.html.twig',
            [
                'positions' => $defaultController->getEmploymentRepo()->all(),
                'skills' => $defaultController->getSkillsRepo()->all(),
            ]);

        $this->assertInstanceOf(Response::class, $response);
    }
}
