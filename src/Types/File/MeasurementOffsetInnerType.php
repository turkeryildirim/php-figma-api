<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Types\AbstractType;

class MeasurementOffsetInnerType extends AbstractType
{
    public readonly string $type;
    public readonly int|float $relative;

    public function __construct(array $data)
    {
        $this->type = 'INNER';
        $this->relative = $data['relative'];
    }
}
