<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Enums\Comment\CommentPinCornerEnum;

trait CommentPinCornerTrait
{
    public ?CommentPinCornerEnum $commentPinCorner;
    final protected function __commentPinCorner(array $data): void
    {
        $this->commentPinCorner = ( !empty($data['comment_pin_corner']) && CommentPinCornerEnum::hasValue($data['comment_pin_corner']) )
            ? CommentPinCornerEnum::tryFrom($data['comment_pin_corner']) : null;
    }
}
