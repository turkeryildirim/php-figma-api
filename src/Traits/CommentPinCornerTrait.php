<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Enums\Comment\CommentPinCornerEnum;
use Turker\FigmaAPI\Util\Helper;

trait CommentPinCornerTrait
{
    public ?string $commentPinCorner;
    final protected function __commentPinCorner(array $data): void
    {
        $this->commentPinCorner = Helper::makeFromEnum($data['comment_pin_corner'], CommentPinCornerEnum::class);
    }
}
