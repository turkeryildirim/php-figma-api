<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum PaintTypeEnum: string
{
    use EnumArrayTrait;

    case SOLID            = 'SOLID';
    case GRADIENT_LINEAR  = 'GRADIENT_LINEAR';
    case GRADIENT_RADIAL  = 'GRADIENT_RADIAL';
    case GRADIENT_ANGULAR = 'GRADIENT_ANGULAR';
    case GRADIENT_DIAMOND = 'GRADIENT_DIAMOND';
    case IMAGE            = 'IMAGE';
    case EMOJI            = 'EMOJI';
    case VIDEO            = 'VIDEO';
}
