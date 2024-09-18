<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PagePrincipaleController extends AbstractController
{
    #[Route('/principal', name: 'app_page_principale')]
    public function index(): Response
    {
        return $this->render('page_principale/index.html.twig', [
            'controller_name' => 'PagePrincipaleController',
        ]);
    }
}
