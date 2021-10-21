<?php
namespace App\Controller;

use App\Repository\PhotoRepository;
use App\Repository\ArticleRepository;
use App\Repository\TextRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
    * @Route("/", name="home", methods={"GET","POST"})
    */
    public function index(ArticleRepository $articleRepository, PhotoRepository $photoRepository, SessionInterface $session, TextRepository $textRepository)
    {
        $texts = $textRepository->findAllText();
        foreach ($texts as $key => $text){
            $texts[$text['location']] = $text['body'];
        }
        if (!$session->isStarted()) {
            $session->start();
        }
        $basket = $session->get('basket', []);
        
        return $this->render('home/index.html.twig', [
            'articles' => $articleRepository->findAll(),
            'photos' => $photoRepository->findAll(),
            'basket' => $basket,
            'texts' => $texts,
        ]);
    }
}