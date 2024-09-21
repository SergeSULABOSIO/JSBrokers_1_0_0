<?php

namespace App\Twig\Components;

use DateTimeImmutable;
use App\Entity\UtilisateurJSB;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\ValidatableComponentTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[AsLiveComponent()]
class NewUtilisateur extends AbstractController
{
    use DefaultActionTrait;
    use ValidatableComponentTrait;

    public bool $isSaved = false;

    #[LiveProp(writable: [
        'nom',
        'email',
        'motDePasse',
        'motDePasseConfirme',
    ])]
    #[Assert\Valid]
    public UtilisateurJSB $utilisateur;

    public function __construct()
    {
        $this->utilisateur = new UtilisateurJSB();
    }

    #[LiveAction]
    public function enregistrerUtilisateurJSB(EntityManagerInterface $entityManager)
    {
        $this->validate();
        $this->isSaved = true;

        $this->utilisateur->setCreatedAt(new DateTimeImmutable("now"));
        $entityManager->persist($this->utilisateur);
        $entityManager->flush();
    }

    #[LiveAction]
    public function saveAndRedirect(EntityManagerInterface $entityManager): RedirectResponse
    {
        $this->validate();
        $this->isSaved = true;

        $this->utilisateur->setCreatedAt(new DateTimeImmutable("now"));
        $entityManager->persist($this->utilisateur);
        $entityManager->flush();

        return $this->redirectToRoute('app_page_index');
    }


    #[LiveAction]
    public function afficherParams(#[LiveArg('id')] int $id, #[LiveArg('nom')] string $nom)
    {
        dd("Résultat de la saisie :", $id, $nom);
        $this->isSaved = true;
    }
}
