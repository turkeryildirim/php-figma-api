<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Enums\File\StrokeCapEnum;

trait StrokeCapTrait
{
    public readonly ?StrokeCapEnum $strokeCap;
    final protected function __strokeCap(array $data): void
    {
        $this->strokeCap = ( !empty($data['strokeCap']) && StrokeCapEnum::hasValue($data['strokeCap']) )
            ? StrokeCapEnum::tryFrom($data['strokeCap']) : null;
    }
}
