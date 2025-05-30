<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Types\AbstractType;
use Turker\FigmaAPI\Util\Helper;

class ColorType extends AbstractType
{
    public readonly int|float|null $r;
    public readonly int|float|null $g;
    public readonly int|float|null $b;
    public readonly int|float|null $a;

    public function __construct(array $data)
    {
        $this->r = Helper::makeInteger($data['r'], 0);
        $this->g = Helper::makeInteger($data['g'], 0);
        $this->b = Helper::makeInteger($data['b'], 0);
        $this->a = Helper::makeInteger($data['a'], 1);
    }
}
