<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Types\File\RectangleType;

trait AbsoluteBoundingBoxTrait
{
    public readonly ?RectangleType $absoluteBoundingBox;
    final protected function __absoluteBoundingBox(array $data): void
    {
        $this->absoluteBoundingBox = !empty($data['absoluteBoundingBox']) ?
            new RectangleType($data['absoluteBoundingBox']) : null;
    }
}
