<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\File;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum StrokeCapEnum: string
{
    use EnumArrayTrait;

    case NONE = 'NONE';
    case ROUND = 'ROUND';
    case SQUARE = 'SQUARE';
    case LINE_ARROW = 'LINE_ARROW';
    case TRIANGLE_ARROW = 'TRIANGLE_ARROW';
    case DIAMOND_FILLED = 'DIAMOND_FILLED';
    case CIRCLE_FILLED = 'CIRCLE_FILLED';
    case TRIANGLE_FILLED = 'TRIANGLE_FILLED';
    case WASHI_TAPE_1 = 'WASHI_TAPE_1';
    case WASHI_TAPE_2 = 'WASHI_TAPE_2';
    case WASHI_TAPE_3 = 'WASHI_TAPE_3';
    case WASHI_TAPE_4 = 'WASHI_TAPE_4';
    case WASHI_TAPE_5 = 'WASHI_TAPE_5';
    case WASHI_TAPE_6 = 'WASHI_TAPE_6';
}
