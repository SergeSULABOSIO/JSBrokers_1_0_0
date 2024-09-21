<?php

namespace App\Twig\Components;

use App\Entity\Utilisateur;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent()]
class NewUtilisateur
{
    use DefaultActionTrait;

    // #[LiveProp]
    #[LiveProp(writable: true)]
    public string $nom = "";

    #[LiveProp(writable: [
        'email',
        'plainPassword',
        'nom',
        'pseudo',
    ])]
    public Utilisateur $utilisateur;

    public function __construct() {}
}
