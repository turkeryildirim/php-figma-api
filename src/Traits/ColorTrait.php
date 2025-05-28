<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Types\File\ColorType;

trait ColorTrait
{
    public readonly ?ColorType $color;
    final protected function __color(array $data): void
    {
        $this->color = !empty($data['color']) ? new ColorType($data['color']) : null;
    }
}
