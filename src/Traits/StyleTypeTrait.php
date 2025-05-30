<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Enums\Style\StyleTypeEnum;
use Turker\FigmaAPI\Util\Helper;

trait StyleTypeTrait
{
    public readonly ?string $styleType;
    final protected function __styleType(array $data): void
    {
        $styleType       = $data['style_type'] ?? $data['styleType'] ?? null;
        $this->styleType = Helper::makeFromEnum($styleType, StyleTypeEnum::class);
    }
}
