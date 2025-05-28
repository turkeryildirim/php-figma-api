<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Enums\File\StrokeAlignEnum;

trait StrokeAlignTrait
{
    public readonly ?StrokeAlignEnum $strokeAlign;
    final protected function __strokeAlign(array $data): void
    {
        $this->strokeAlign = ( !empty($data['strokeAlign']) && StrokeAlignEnum::hasValue($data['strokeAlign']) )
            ? StrokeAlignEnum::tryFrom($data['strokeAlign']) : null;
    }
}
