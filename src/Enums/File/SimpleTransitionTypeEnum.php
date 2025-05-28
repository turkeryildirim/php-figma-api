<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum SimpleTransitionTypeEnum: string
{
    use EnumArrayTrait;

    case DISSOLVE = 'DISSOLVE';
    case SMART_ANIMATE = 'SMART_ANIMATE';
    case SCROLL_ANIMATE = 'SCROLL_ANIMATE';
}
