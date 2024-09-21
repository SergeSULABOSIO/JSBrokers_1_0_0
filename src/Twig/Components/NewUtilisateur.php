<?php
namespace App\Twig\Components;

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

    public function __construct()
    {

    }
}