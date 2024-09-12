<?php

namespace App\Controller\Admin;

use App\Entity\Animals;
use App\Entity\Habitats;
use App\Entity\HorairesZoo;
use App\Entity\Services;
use App\Entity\User;
use App\Entity\Vetvisit;
use App\Document\PageView;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(ServicesCrudController::class)->generateUrl());
        
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Administration');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoRoute('Homepage', 'fa fa-home', 'Accueil');
        yield MenuItem::linktoCrud('Utilisateurs', 'fa fa-user', User::class);
        yield MenuItem::section('Services');
        yield MenuItem::linkToCrud('Services', 'fas fa-edit', Services::class);
        yield MenuItem::linktoCrud('Horaires', 'fas fa-edit', HorairesZoo::class);
        yield MenuItem::linkToCrud('PageViews','fas fa-edit', PageView::class);
        

        yield MenuItem::section('Habitats');
        yield MenuItem::linkToCrud('Habitats', 'fas fa-edit', Habitats::class);
        yield MenuItem::linkToCrud('Animals', 'fas fa-edit', Animals::class);
        yield MenuItem::linktoCrud('Avis Veto', 'fas fa-user-md', Vetvisit::class);
    

        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
