<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Enums\File\StrokeJoinEnum;
use Turker\FigmaAPI\Util\Helper;

trait StrokeJoinTrait
{
    public readonly ?string $strokeJoin;
    final protected function __strokeJoin(array $data): void
    {
        $this->strokeJoin = Helper::makeFromEnum($data['strokeJoin'], StrokeJoinEnum::class);
    }
}
