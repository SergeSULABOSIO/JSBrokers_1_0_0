<?php
namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
class TableauDeBordCourtier
{
    public string $nom = "Tableau de bord du courtier";
    
    public function __construct() {
        
    }

    public function getTableauDeBord()
    {
        
    }
}
