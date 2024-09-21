<?php

namespace App\Twig\Components;

use App\Entity\Utilisateur;
use App\Entity\UtilisateurJSB;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;

#[AsLiveComponent()]
class NewUtilisateur
{
    use DefaultActionTrait;

    public bool $saved = false;

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

    #[LiveAction]
    public function enregistrerUtilisateurJSB()
    {

        $this->saved = true;
    }
}
