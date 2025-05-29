<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Types\AbstractType;
use Turker\FigmaAPI\Util\Helper;

class ArcDataType extends AbstractType
{
    public readonly int|float|null $startingAngle;
    public readonly int|float|null $endingAngle;
    public readonly int|float|null $innerRadius;

    public function __construct(array $data)
    {
        $this->startingAngle = Helper::makeInteger($data['startingAngle']);
        $this->endingAngle   = Helper::makeInteger($data['endingAngle']);
        $this->innerRadius   = Helper::makeInteger($data['innerRadius']);
    }
}
