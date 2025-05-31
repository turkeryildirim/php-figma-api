<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Enums\File\LayoutAlignEnum;
use Turker\FigmaAPI\Util\Helper;

trait LayoutAlignTrait
{
    public readonly ?string $layoutAlign;
    final protected function __layoutAlign(array $data): void
    {
        $this->layoutAlign = Helper::makeFromEnum($data['layoutAlign'], LayoutAlignEnum::class);
    }
}
