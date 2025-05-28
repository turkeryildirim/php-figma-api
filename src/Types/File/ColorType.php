<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Types\AbstractType;

class ColorType extends AbstractType
{
    public readonly int|float $r;
    public readonly int|float $g;
    public readonly int|float $b;
    public readonly int|float $a;

    public function __construct(array $data)
    {
        $this->r = $data['r'];
        $this->g = $data['g'];
        $this->b = $data['b'];
        $this->a = $data['a'] ?? 1;
    }
}
