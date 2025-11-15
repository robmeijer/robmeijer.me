<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\Position;
use App\Entity\Skill;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;

#[AdminDashboard(routePath: '/admin', routeName: 'admin', routeOptions: ['condition' => "env('APP_ENV') === 'dev'"])]
class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private readonly AdminUrlGenerator $urlGenerator,
    ) {}

    public function index(): Response
    {
        return $this->redirect($this->urlGenerator
            ->setController(PositionCrudController::class)
            ->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Rob Meijer');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToUrl('Go to site', 'fa-solid fa-circle-right', '/');
        yield MenuItem::section('Menu');
        yield MenuItem::linkToCrud('Positions', 'fa-solid fa-briefcase', Position::class);
        yield MenuItem::linkToCrud('Skills', 'fa-solid fa-rocket', Skill::class);
    }

    public function configureCrud(): Crud
    {
        return parent::configureCrud()
            ->showEntityActionsInlined();
    }

    public function configureActions(): Actions
    {
        return parent::configureActions()
            ->update(Crud::PAGE_INDEX, Action::EDIT, static fn (Action $action): Action => $action->setIcon('fa-solid fa-pen-to-square'))
            ->update(Crud::PAGE_INDEX, Action::DELETE, static fn (Action $action): Action => $action->setLabel(false));
    }
}
