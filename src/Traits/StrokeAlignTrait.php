<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Enums\File\StrokeAlignEnum;
use Turker\FigmaAPI\Util\Helper;

trait StrokeAlignTrait
{
    public readonly ?string $strokeAlign;
    final protected function __strokeAlign(array $data): void
    {
        $this->strokeAlign = Helper::makeFromEnum($data['strokeAlign'], StrokeAlignEnum::class);
    }
}
