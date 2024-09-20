<?php

namespace App\Twig\Components;

use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
class BoutonLien
{
    public const TYPE_SUCCESS = 0;
    public const TYPE_NORMAL = 1;
    public const TYPE_WARNING = 2;
    public const TYPE_ERRROR = 3;
    public const TYPE_PRIMARY = 4;

    public int $type;
    public string $texte;
    public string $icone;
    public string $pathName;

    public function __construct() {}

    public function getButtonType()
    {
        switch ($this->type) {
            case self::TYPE_SUCCESS:
                return "btn btn-outline-secondary btn-success text-light border border-0";

            case self::TYPE_NORMAL:
                return "btn btn-outline-secondary btn-light text-light border border-0";

            case self::TYPE_WARNING:
                return "btn btn-outline-secondary btn-warning text-light border border-0";

            case self::TYPE_ERRROR:
                return "btn btn-outline-secondary btn-danger text-light border border-0";

            case self::TYPE_PRIMARY:
                return "btn btn-outline-secondary btn-primary text-light border border-0";
        }
    }
}
