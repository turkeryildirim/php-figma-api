<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Types\AbstractType;

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
        $this->exposure    = $data['exposure'] ?? 0;
        $this->contrast    = $data['contrast'] ?? 0;
        $this->saturation  = $data['saturation'] ?? 0;
        $this->temperature = $data['temperature'] ?? 0;
        $this->tint        = $data['tint'] ?? 0;
        $this->highlights  = $data['highlights'] ?? 0;
        $this->shadows     = $data['shadows'] ?? 0;
    }
}
