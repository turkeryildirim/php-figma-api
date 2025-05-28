<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Enums\File\LayoutAlignEnum;

trait LayoutAlignTrait
{
    public readonly ?LayoutAlignEnum $layoutAlign;
    final protected function __layoutAlign(array $data): void
    {
        $this->layoutAlign = ( !empty($data['layoutAlign']) && LayoutAlignEnum::hasValue($data['layoutAlign']) )
            ? LayoutAlignEnum::tryFrom($data['layoutAlign']) : null;
    }
}
