<?php declare(strict_types=1);

namespace App\Controller;

use App\Repository\PositionRepository;
use App\Repository\SkillRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(PositionRepository $positions, SkillRepository $skills): Response
    {
        return $this->render('default/index.html.twig', [
            'positions' => $positions->findAll(),
            'skills' => $skills->findAll(),
        ]);
    }
}
