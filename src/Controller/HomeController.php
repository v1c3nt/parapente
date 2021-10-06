<?php
namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\PhotoRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
    * @Route("/", name="home", methods={"GET","POST"})
    */
    public function index(ArticleRepository $articleRepository, PhotoRepository $photoRepository)
    {
        return $this->render('home/index.html.twig', [
            'articles' => $articleRepository->findAll(),
            'photos' => $photoRepository->findAll(),
        ]);
    }
}