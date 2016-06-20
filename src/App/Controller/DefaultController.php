<?php

namespace App\Controller;

use App;
use App\Repository\Contracts\Repo;
use App\Repository\SkillsRepo;

/**
 * Class DefaultController
 *
 * @package App\Controller
 */
class DefaultController extends Controller
{
    /**
     * @var Repo
     */
    protected $employmentRepo;
    /**
     * @var \App\Repository\SkillsRepo
     */
    protected $skillsRepo;

    /**
     * DefaultController constructor
     *
     * @param App $app
     * @param Repo $employmentRepo
     * @param SkillsRepo $skillsRepo
     */
    public function __construct(App $app, Repo $employmentRepo, SkillsRepo $skillsRepo)
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
                'positions' => $this->getEmploymentRepo()->get(),
                'skills' => $this->getSkillsRepo()->get(),
            ]);
    }

    /**
     * @return Repo
     */
    public function getEmploymentRepo()
    {
        return $this->employmentRepo;
    }

    /**
     * @return SkillsRepo
     */
    public function getSkillsRepo()
    {
        return $this->skillsRepo;
    }
}
