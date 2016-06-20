<?php

namespace App\Controller;

use App;
use App\Repository\Contracts\Employment;
use App\Repository\Contracts\Skills;

/**
 * Class DefaultController
 *
 * @package App\Controller
 */
class DefaultController extends Controller
{
    /**
     * @var \App\Repository\Contracts\Employment
     */
    protected $employment;
    /**
     * @var \App\Repository\Contracts\Skills
     */
    protected $skills;

    /**
     * DefaultController constructor
     *
     * @param App $app
     * @param Employment $employment
     * @param Skills $skills
     */
    public function __construct(App $app, Employment $employment, Skills $skills)
    {
        parent::__construct($app);
        $this->employment = $employment;
        $this->skills = $skills;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function __invoke()
    {
        return $this->render(
            'default.html.twig',
            [
                'positions' => $this->getEmployment()->getPositions(),
                'skills' => $this->getSkills()->getSkills(),
            ]);
    }

    /**
     * @return Employment
     */
    public function getEmployment()
    {
        return $this->employment;
    }

    /**
     * @return Skills
     */
    public function getSkills()
    {
        return $this->skills;
    }
}
