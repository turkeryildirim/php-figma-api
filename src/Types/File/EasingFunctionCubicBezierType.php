<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Types\AbstractType;
use Turker\FigmaAPI\Util\Helper;

class EasingFunctionCubicBezierType extends AbstractType
{
    public readonly int|float|null $x1;
    public readonly int|float|null $x2;
    public readonly int|float|null $y1;
    public readonly int|float|null $y2;

    public function __construct(array $data)
    {
        $this->x1 = Helper::makeInteger($data['x1']);
        $this->x2 = Helper::makeInteger($data['x2']);
        $this->y1 = Helper::makeInteger($data['y1']);
        $this->y2 = Helper::makeInteger($data['y2']);
    }
}
