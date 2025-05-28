<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Types\File\RectangleType;

trait AbsoluteRenderBoundsTrait
{
    public readonly ?RectangleType $absoluteRenderBounds;
    final protected function __absoluteRenderBounds(array $data): void
    {
        $this->absoluteRenderBounds = !empty($data['absoluteRenderBounds']) ?
            new RectangleType($data['absoluteRenderBounds']) : null;
    }
}
