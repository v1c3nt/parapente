<?php

namespace App\Controller\Admin;

use App\Entity\Order;
use App\Entity\Photo;
use App\Entity\Article;
use App\Entity\Option;
use App\Entity\Text;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="easy_admin")
     */
    public function index(): Response
    {
        Dashboard::new()
            ->setTitle('Parapente')
            ->renderContentMaximized()
            ->renderSidebarMinimized();
        //$routeBuilder = $this->get(CrudUrlGenerator::class)->build();
        return $this->render('bundles/EasyAdminBundle/crud/welcome.html.twig');
    }


    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::subMenu("photo", 'fa fa-camera-retro')->setSubItems([
                MenuItem::linkToCrud('Liste', 'fas fa-list-ol', Photo::class),
                MenuItem::linkToCrud('Nouveau', 'fas fa-plus', Photo::class)
                    ->setAction('new')
            ]),
            MenuItem::subMenu("texte", 'fa fa-keyboard')->setSubItems([
                MenuItem::linkToCrud('Liste', 'fas fa-list-ol', Text::class),
                MenuItem::linkToCrud('Nouveau', 'fas fa-plus', Text::class)
                    ->setAction('new')
            ]),
            MenuItem::subMenu("option", 'fa fa-puzzle-piece')->setSubItems([
                MenuItem::linkToCrud('Liste', 'fas fa-list-ol', Option::class),
                MenuItem::linkToCrud('Nouveau', 'fas fa-plus', Option::class)
                    ->setAction('new')
            ]),
            MenuItem::subMenu("article", 'fa fa-key')->setSubItems([
                MenuItem::linkToCrud('Liste', 'fas fa-list-ol', Article::class),
                MenuItem::linkToCrud('Nouveau', 'fas fa-plus', Article::class)
                    ->setAction('new')
            ]),
            MenuItem::subMenu("commande", 'fa fa-money')->setSubItems([
                MenuItem::linkToCrud('Liste', 'fas fa-list-ol', Order::class),
                MenuItem::linkToCrud('Nouveau', 'fas fa-plus', Order::class)
                    ->setAction('new')
            ]),
        ];
    }

    public function configureAssets(): Assets
    {
        return Assets::new()->addCssFile('build/admin.css');
    }
}
