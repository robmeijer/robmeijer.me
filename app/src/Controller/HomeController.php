<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\PositionRepository;
use App\Repository\SkillRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/', name: 'home')]
class HomeController extends AbstractController
{
    public function __invoke(PositionRepository $positions, SkillRepository $skills): Response
    {
        return $this->render('home.html.twig', [
            'positions' => $positions->findAll(),
            'skills' => $skills->findAll(),
        ]);
    }
}
