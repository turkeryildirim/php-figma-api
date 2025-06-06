<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Types\AbstractType;
use Turker\FigmaAPI\Util\Helper;

class StrokeWeightsType extends AbstractType
{
    public readonly int|float|null $top;
    public readonly int|float|null $right;
    public readonly int|float|null $bottom;
    public readonly int|float|null $left;

    public function __construct(array $data)
    {
        $this->top    = Helper::makeInteger($data['top']);
        $this->right  = Helper::makeInteger($data['right']);
        $this->bottom = Helper::makeInteger($data['bottom']);
        $this->left   = Helper::makeInteger($data['left']);
    }
}
