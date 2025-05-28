<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Enums\File\StrokeJoinEnum;

trait StrokeJoinTrait
{
    public readonly ?StrokeJoinEnum $strokeJoin;
    final protected function __strokeJoin(array $data): void
    {
        $this->strokeJoin = ( !empty($data['strokeJoin']) && StrokeJoinEnum::hasValue($data['strokeJoin']) )
            ? StrokeJoinEnum::tryFrom($data['strokeJoin']) : null;
    }
}
