<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Enums\Style\StyleTypeEnum;

trait StyleTypeTrait
{
    public readonly ?StyleTypeEnum $styleType;
    final protected function __styleType(array $data): void
    {
        $styleType       = $data['style_type'] ?? $data['styleType'] ?? null;
        $this->styleType = ( !empty($styleType) && StyleTypeEnum::hasValue($styleType) )
            ? StyleTypeEnum::tryFrom($styleType) : null;
    }
}
