<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum ConnectorStrokeCapEnum: string
{
    use EnumArrayTrait;

    case NONE = 'NONE';
    case LINE_ARROW = 'LINE_ARROW';
    case TRIANGLE_ARROW = 'TRIANGLE_ARROW';
    case DIAMOND_FILLED = 'DIAMOND_FILLED';
    case CIRCLE_FILLED = 'CIRCLE_FILLED';
    case TRIANGLE_FILLED = 'TRIANGLE_FILLED';
}
