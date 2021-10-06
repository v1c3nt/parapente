<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use App\Service\MailService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactUsController extends AbstractController
{
    /**
     * @Route("/nous-contacter", name="contact_us")
     */
    public function index(Request $request, MailService $mailer): Response
    {
        $post = new Post();
        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $post = $form->getData();

        $mailer->newQuestion($post->getEmail(), $post->getMessage(), $post->getCopy());

        dd('regarde dans tes mails ;)');
    
        }
        return $this->render('contact_us/index.html.twig', [
            'controller_name' => 'ContactUsController',
            'form' => $form->createView(),
        ]);
    }
}
