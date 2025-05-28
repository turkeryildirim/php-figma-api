<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Types\AbstractType;

class EasingFunctionCubicBezierType extends AbstractType
{
    public readonly int|float $x1;
    public readonly int|float $x2;
    public readonly int|float $y1;
    public readonly int|float $y2;

    public function __construct(array $data)
    {
        $this->x1 = $data['x1'];
        $this->x2 = $data['x2'];
        $this->y1 = $data['y1'];
        $this->y2 = $data['y2'];
    }
}
