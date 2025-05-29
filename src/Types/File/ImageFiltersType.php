<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Types\AbstractType;
use Turker\FigmaAPI\Util\Helper;

class ImageFiltersType extends AbstractType
{
    public readonly int|float $exposure;
    public readonly int|float $contrast;
    public readonly int|float $saturation;
    public readonly int|float $temperature;
    public readonly int|float $tint;
    public readonly int|float $highlights;
    public readonly int|float $shadows;

    public function __construct(array $data)
    {
        $this->exposure    = Helper::makeInteger($data['exposure'], 0);
        $this->contrast    = Helper::makeInteger($data['contrast'], 0);
        $this->saturation  = Helper::makeInteger($data['saturation'], 0);
        $this->temperature = Helper::makeInteger($data['temperature'], 0);
        $this->tint        = Helper::makeInteger($data['tint'], 0);
        $this->highlights  = Helper::makeInteger($data['highlights'], 0);
        $this->shadows     = Helper::makeInteger($data['shadows'], 0);
    }
}
