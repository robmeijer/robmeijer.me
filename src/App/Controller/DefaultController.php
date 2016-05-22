<?php

namespace App\Controller;

use App;
use App\Repository\EmploymentRepo;
use App\Repository\SkillsRepo;

class DefaultController extends Controller
{
    protected $employmentRepo;
    protected $skillsRepo;

    public function __construct(App $app, EmploymentRepo $employmentRepo, SkillsRepo $skillsRepo)
    {
        parent::__construct($app);
        $this->employmentRepo = $employmentRepo;
        $this->skillsRepo = $skillsRepo;
    }

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
