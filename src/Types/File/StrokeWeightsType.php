<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Types\AbstractType;

class StrokeWeightsType extends AbstractType
{
    public readonly int|float $top;
    public readonly int|float $right;
    public readonly int|float $bottom;
    public readonly int|float $left;

    public function __construct(array $data)
    {
        $this->top    = $data['top'];
        $this->right  = $data['right'];
        $this->bottom = $data['bottom'];
        $this->left   = $data['left'];
    }
}
