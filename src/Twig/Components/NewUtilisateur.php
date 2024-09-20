<?php
namespace App\Twig\Components;

use DateTimeImmutable;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;

#[AsLiveComponent]
class NewUtilisateur
{
    use DefaultActionTrait;
    
    public string $nom = "";
    
    public function __construct()
    {

    }
}