<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Traits\XTrait;
use Turker\FigmaAPI\Traits\YTrait;
use Turker\FigmaAPI\Types\AbstractType;
use Turker\FigmaAPI\Util\Helper;

class RectangleType extends AbstractType
{
    use XTrait;
    use YTrait;

    public readonly int|float|null $width;
    public readonly int|float|null $height;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
        $this->width  = Helper::makeInteger($data['width']);
        $this->height = Helper::makeInteger($data['height']);
    }
}
