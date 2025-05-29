<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Types\AbstractType;

class ArcDataType extends AbstractType
{
    public readonly int|float $startingAngle;
    public readonly int|float $endingAngle;
    public readonly int|float $innerRadius;

    public function __construct(array $data)
    {
        $this->startingAngle = $data['startingAngle'];
        $this->endingAngle   = $data['endingAngle'];
        $this->innerRadius   = $data['innerRadius'];
    }
}
