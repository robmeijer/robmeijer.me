<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\Position;
use App\Entity\Skill;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private readonly AdminUrlGenerator $urlGenerator,
    ) {}

    #[Route('/admin', name: 'app_admin', host: 'localhost', env: 'dev')]
    public function index(): Response
    {
        return $this->redirect($this->urlGenerator->setController(PositionCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Rob Meijer');
    }

    public function configureCrud(): Crud
    {
        return parent::configureCrud()
            ->showEntityActionsInlined();
    }

    public function configureActions(): Actions
    {
        return parent::configureActions()
            ->update(Crud::PAGE_INDEX, Action::EDIT, static function (Action $action) {
                return $action->setIcon('fas fa-edit');
            })
            ->update(Crud::PAGE_INDEX, Action::DELETE, static function (Action $action) {
                return $action->setIcon('far fa-trash-alt')->setLabel(false);
            });
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Go to site', 'fa fa-arrow-alt-circle-right', 'app_home');
        yield MenuItem::section('Menu');
        yield MenuItem::linkToCrud('Positions', 'fa-solid fa-briefcase', Position::class);
        yield MenuItem::linkToCrud('Skills', 'fa-solid fa-rocket', Skill::class);
    }
}
