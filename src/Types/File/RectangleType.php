<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Traits\XTrait;
use Turker\FigmaAPI\Traits\YTrait;
use Turker\FigmaAPI\Types\AbstractType;

class RectangleType extends AbstractType
{
    use XTrait;
    use YTrait;

    public readonly int|float $width;
    public readonly int|float $height;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
        $this->width  = $data['width'];
        $this->height = $data['height'];
    }
}
