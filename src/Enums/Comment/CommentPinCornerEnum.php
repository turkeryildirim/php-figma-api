<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Enums\Comment;

use Turker\FigmaAPI\Traits\EnumArrayTrait;

enum CommentPinCornerEnum: string
{
    use EnumArrayTrait;

    case BOTTOM_RIGHT = 'bottom-right';
    case BOTTOM_LEFT  = 'bottom-left';
    case TOP_RIGHT    = 'top-right';
    case TOP_LEFT     = 'top-left';
}
