<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// #[isGranted('ROLE_ADMIN')]
class AdminController extends AbstractController
{
    #[Route('/admin', name: 'admin')]
    // #[IsGranted('ROLE_ADMIN', statusCode: 403, message: 'Accès refuser aux nom-admins')]
    public function index(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, "accès refusé");
        
        // if(!$this->getUser()) {
        //     $this->addFlash('danger', 'Vous devez être connecté pour accéder à cette page');

        //     return $this->redirectToRoute('home');
        // }

        // if(!$this->isGranted('ROLE_ADMIN')) {
        //     $this->addFlash('danger', 'Vous devez être admin pour accéder à cette page');

        //     return $this->redirectToRoute('home');
        // }

        return $this->render('admin/index.html.twig', );
    }
}
