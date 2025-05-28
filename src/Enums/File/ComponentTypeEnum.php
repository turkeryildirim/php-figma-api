<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum ComponentTypeEnum: string
{
    use EnumArrayTrait;

    case COMPONENT = 'COMPONENT';
    case COMPONENT_SET = 'COMPONENT_SET';
}
