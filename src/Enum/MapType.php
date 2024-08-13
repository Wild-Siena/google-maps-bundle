<?php

namespace WildSiena\GoogleMapsBundle\Enum;

enum MapType: string
{
    case ROADMAP = "roadmap";
    case SATELLITE = "satellite";
    case HYBRID = "hybrid";
    case TERRAIN = "terrain";
}
