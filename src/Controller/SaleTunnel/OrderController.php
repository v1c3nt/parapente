<?php
namespace App\Controller\SaleTunnel;

use App\Entity\Order;
use App\Form\OrderType;
use App\Service\BasketService;
use Symfony\Component\Form\FormView;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OrderController extends AbstractController
{
    private $session;
    private $basketService;
    
    public function __construct(SessionInterface $session, BasketService $basketService)
    {
        $this->session = $session;
        $this->basketService = $basketService;
    }
    /**
    * @Route("/resumer-de-la-commander", name="order_summary", methods={"GET"})
    */
    public function order()
    {
        $articles = $this->session->get('basket', []);
        $order = $this->basketService->summary($articles);

        dd($order);
    }

    /**
    * @Route("/commander", name="order", methods={"GET","POST"})
    */
    public function orderValide(Request $request, EntityManagerInterface $entityManagerInterface): Response
    {
        $articles = $this->session->get('basket', []);
        $basket = $this->basketService->summary($articles);

        $order = (new Order())
                ->setAmound($basket['totalAmound'])
        ;
        foreach ($basket['basket'] as $article){
            $order->addArticle($article['article']);
        }

        $form = $this->createForm(OrderType::class, $order);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $order = $form->getData();
            $entityManagerInterface->persist($order);
            dd($order);
            $entityManagerInterface->flush();

        }
        return $this->render('order/order.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}