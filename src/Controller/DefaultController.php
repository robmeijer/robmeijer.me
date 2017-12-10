<?php

namespace App\Controller;

use App\Repository\PositionRepository;
use App\Repository\SkillRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    /**
     * @param PositionRepository $positions
     * @param SkillRepository $skills
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(PositionRepository $positions, SkillRepository $skills)
    {
        return $this->render('default/index.html.twig', [
            'positions' => $positions->findAll(),
            'skills' => $skills->findAll(),
        ]);
    }
}
