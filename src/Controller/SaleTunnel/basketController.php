<?php
namespace App\Controller\SaleTunnel;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Service\BasketService;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionBagInterface;

class basketController extends AbstractController
{
    /**
    * @Route("/panier", name="basket", methods={"GET"})
    */
    public function index(SessionInterface $session, BasketService $basketService)
    {
        $basket = $basketService->summary($session->get('basket', []));

        return $this->render('basket/basket.html.twig', [
            'basket' => $basket,
        ]);
    }

    /**
    * @Route("/ajouter/{article}", name="add_article", methods={"GET","POST"})
    */
    public function addArticle(Article $article, SessionInterface $session, ArticleRepository $articleRepository)
    {
        if (!$session->isStarted()) {
            $session->start();
        }
        $basket = $session->get('basket', []);
        if (empty($basket[$article->getId()])) {
            $basket[$article->getId()] = ['number' => 1 , 'article' => $article];
        } else {
            $basket[$article->getId()] = ['number' => $basket[$article->getId()]['number'] + 1 , 'article' => $article];
        }
        $session->set('basket', $basket);

        return $this->redirectToRoute('all_articles');

    }    
    /**
    * @Route("/retirer/{article}", name="remove_article", methods={"GET","POST"})
    */
    public function removeArticle(Article $article, SessionInterface $session)
    {
        if (!$session->isStarted()) {
            $session->start();
        }
        $basket = $session->get('basket', []);
        if ( 1 === $basket[$article->getId()]['number'] ) {
            unset($basket[$article->getId()]);
        } else {
            $basket[$article->getId()]['number'] = $basket[$article->getId()]['number'] - 1;
        }
        $session->set('basket', $basket);
        //TODO faire en ajax ou différencier redirecction pour le moins du panier
        return $this->redirectToRoute('all_articles');
    }
}