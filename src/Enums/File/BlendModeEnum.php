<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum BlendModeEnum: string
{
    use EnumArrayTrait;

    case PASS_THROUGH = 'PASS_THROUGH';
    case NORMAL = 'NORMAL';

    case DARKEN = 'DARKEN';
    case MULTIPLY = 'MULTIPLY';
    case LINEAR_BURN = 'LINEAR_BURN';
    case COLOR_BURN = 'COLOR_BURN';

    case LIGHTEN = 'LIGHTEN';
    case SCREEN = 'SCREEN';
    case LINEAR_DODGE = 'LINEAR_DODGE';
    case COLOR_DODGE = 'COLOR_DODGE';

    case OVERLAY = 'OVERLAY';
    case SOFT_LIGHT = 'SOFT_LIGHT';
    case HARD_LIGHT = 'HARD_LIGHT';

    case DIFFERENCE = 'DIFFERENCE';
    case EXCLUSION = 'EXCLUSION';

    case HUE = 'HUE';
    case SATURATION = 'SATURATION';
    case COLOR = 'COLOR';
    case LUMINOSITY = 'LUMINOSITY';
}
