<?php

namespace App\Controller;

use App;
use App\Repository\EmploymentRepo;
use App\Repository\SkillsRepo;

/**
 * Class DefaultController
 *
 * @package App\Controller
 */
class DefaultController extends Controller
{
    /**
     * @var \App\Repository\EmploymentRepo
     */
    protected $employmentRepo;
    /**
     * @var \App\Repository\SkillsRepo
     */
    protected $skillsRepo;

    /**
     * DefaultController constructor.
     *
     * @param App $app
     * @param EmploymentRepo $employmentRepo
     * @param SkillsRepo $skillsRepo
     */
    public function __construct(App $app, EmploymentRepo $employmentRepo, SkillsRepo $skillsRepo)
    {
        parent::__construct($app);
        $this->employmentRepo = $employmentRepo;
        $this->skillsRepo = $skillsRepo;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function __invoke()
    {
        return $this->render(
            'default.html.twig',
            [
                'positions' => $this->employmentRepo->all(),
                'skills' => $this->skillsRepo->all(),
            ]);
    }
}
