<?php
declare(strict_types=1);

namespace WildSiena\GoogleMapsBundle\Enum;

enum GestureType: string
{
    case COOPERATIVE = "cooperative";
    case AUTO = "auto";
    case GREEDY = "greedy";
    case NONE = "none";
}
