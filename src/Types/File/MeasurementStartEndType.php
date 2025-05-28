<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Enums\File\DirectionEnum;
use Turker\FigmaAPI\Traits\NodeIdTrait;
use Turker\FigmaAPI\Types\AbstractType;

class MeasurementStartEndType extends AbstractType
{
    use NodeIdTrait;

    public readonly ?DirectionEnum $side;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
        $this->side = ( !empty($data['side']) && DirectionEnum::hasValue($data['side']) )
            ? DirectionEnum::tryFrom($data['side']) : null;
    }
}
