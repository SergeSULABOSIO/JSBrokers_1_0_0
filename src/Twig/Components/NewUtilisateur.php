<?php
namespace App\Twig\Components;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
class NewUtilisateur
{
    use DefaultActionTrait;
    
    // #[LiveProp]
    #[LiveProp(writable: true)]
    public string $nom = "";

    public function __construct()
    {

    }

    public function getRandomNumber(): int
    {
        return rand(0, 100);
    }
}