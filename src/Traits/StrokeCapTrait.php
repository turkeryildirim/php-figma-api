<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Enums\File\StrokeCapEnum;
use Turker\FigmaAPI\Util\Helper;

trait StrokeCapTrait
{
    public readonly ?string $strokeCap;
    final protected function __strokeCap(array $data): void
    {
        $this->strokeCap = Helper::makeFromEnum($data['strokeCap'], StrokeCapEnum::class);
    }
}
