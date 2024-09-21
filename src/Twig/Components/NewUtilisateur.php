<?php

namespace App\Twig\Components;

use DateTimeImmutable;
use App\Entity\Utilisateur;
use App\Entity\UtilisateurJSB;
use App\Repository\UtilisateurJSBRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;

#[AsLiveComponent(csrf: true)]
// #[AsLiveComponent()]
class NewUtilisateur extends AbstractController
{
    use DefaultActionTrait;

    #[LiveProp]
    public bool $saved = false;

    public bool $validated = false;

    #[LiveProp(writable: [
        'nom',
        'email',
        'motDePasse',
        'motDePasseConfirme',
    ])]
    public UtilisateurJSB $utilisateur;

    public function __construct(private EntityManagerInterface $entityManager)
    {
        $this->utilisateur = new UtilisateurJSB();
    }

    #[LiveAction]
    public function enregistrerUtilisateurJSB()
    {
        $this->utilisateur->setCreatedAt(new DateTimeImmutable("now"));
        // dd($this->utilisateur);
        $this->saved = true;
        $this->validated = true;
        $this->entityManager->persist($this->utilisateur);
        $this->entityManager->flush();
    }

    #[LiveAction]
    public function saveAndRedirect(): RedirectResponse
    {
        $this->utilisateur->setCreatedAt(new DateTimeImmutable("now"));
        $this->entityManager->persist($this->utilisateur);
        $this->entityManager->flush();
        return $this->redirectToRoute('app_page_index');
    }


    #[LiveAction]
    public function afficherParams(#[LiveArg('id')] int $id, #[LiveArg('nom')] string $nom)
    {
        dd("Résultat de la saisie :", $id, $nom);
        $this->saved = true;
    }
}
