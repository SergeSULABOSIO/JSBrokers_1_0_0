<?php

namespace App\Twig\Components;

use App\Entity\Utilisateur;
use App\Entity\UtilisateurJSB;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent()]
class NewUtilisateur
{
    use DefaultActionTrait;

    // #[LiveProp]
    // #[LiveProp(writable: true)]
    // public string $nom = "";

    #[LiveProp(writable: [
        'nom',
        'email',
        'motDePasse',
        'motDePasseConfirme',
    ])]
    public UtilisateurJSB $utilisateur;

    public function __construct() {
        $this->utilisateur = new UtilisateurJSB();
    }
}
