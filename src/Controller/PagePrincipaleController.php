<?php

namespace App\Controller;

use App\Service\ServiceCrossCanal;
use App\Service\ServiceEntreprise;
use App\Service\ServicePreferences;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PagePrincipaleController extends AbstractController
{

    public function __construct(
        private ServicePreferences $servicePreferences,
        private EntityManagerInterface $entityManager,
        private AdminUrlGenerator $adminUrlGenerator,
        private ServiceEntreprise $serviceEntreprise,
        private ServiceCrossCanal $serviceCrossCanal
    ) {}



    #[Route('/', name: 'app_page_index')]
    public function index(): Response
    {
        // dd("Page Index");

        return $this->render('page_principale/index.html.twig', [
            'pageName' => "Page d'acceuil du site",
        ]);
    }




    #[Route('/creer_utilisateur', name: 'app_page_creer_utilisateur')]
    public function creerUtilisateur(): Response
    {
        // dd("Création du compte Utilisateur");

        return $this->render('page_principale/creer_utilisateur.html.twig', [
            'pageName' => 'Création du compte Utilisateur',
        ]);
    }




    #[Route('/login_utilisateur', name: 'app_page_login_utilisateur')]
    public function loginUtilisateur(): Response
    {
        // dd("Connexion au compte Utilisateur");

        return $this->render('page_principale/login_utilisateur.html.twig', [
            'pageName' => 'Connexion au compte Utilisateur',
        ]);
    }




    #[Route('/dashbord_utilisateur/{id_utilisateur}', name: 'app_page_dashbord_utilisateur')]
    public function dashbordUtilisateur($id_utilisateur): Response
    {
        // dd("Utilisteur = " . $id_utilisateur);

        return $this->render('page_principale/dashbord_utilisateur.html.twig', [
            'pageName' => 'Dashbord Utilisateur',
        ]);
    }




    #[Route('/creer_entreprise/{id_utilisateur}', name: 'app_page_creer_entreprise')]
    public function creerEntreprise($id_utilisateur): Response
    {
        // dd("Création du compte Entreprise par l'utilisateur " . $id_utilisateur);

        return $this->render('page_principale/creer_entreprise.html.twig', [
            'pageName' => 'Création du compte Entreprise',
        ]);
    }




    
    #[Route('/dashbord_entreprise/{id_utilisateur}/{id_entreprise}', name: 'app_page_dashbord_entreprise')]
    public function dashbordCourtier($id_entreprise, $id_utilisateur): Response
    {
        // dd("Entreprise = " . $id_entreprise . ", Utilisteur = " . $id_utilisateur);

        return $this->render('page_principale/dashbord_entreprise.html.twig', [
            'pageName' => 'Dashbord Courtier',
        ]);
    }
}
