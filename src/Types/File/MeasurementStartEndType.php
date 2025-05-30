<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Enums\File\DirectionEnum;
use Turker\FigmaAPI\Traits\NodeIdTrait;
use Turker\FigmaAPI\Types\AbstractType;
use Turker\FigmaAPI\Util\Helper;

class MeasurementStartEndType extends AbstractType
{
    use NodeIdTrait;

    public readonly ?string $side;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
        $this->side = Helper::makeFromEnum($data['side'], DirectionEnum::class);
    }
}
