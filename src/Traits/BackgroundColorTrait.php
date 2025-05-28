<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Types\File\ColorType;

trait BackgroundColorTrait
{
    public readonly ?ColorType $backgroundColor;
    final protected function __backgroundColor(array $data): void
    {
        $backgroundColor = $data['background_color'] ?? $data['backgroundColor'] ?? null;
        $this->backgroundColor = (!empty($backgroundColor)) ? new ColorType($backgroundColor) : $backgroundColor;
    }
}
