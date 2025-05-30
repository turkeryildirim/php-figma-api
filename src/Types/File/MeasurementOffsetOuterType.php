<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Types\AbstractType;
use Turker\FigmaAPI\Util\Helper;

class MeasurementOffsetOuterType extends AbstractType
{
    public readonly string $type;
    public readonly int|float|null $fixed;

    public function __construct(array $data)
    {
        $this->type  = 'OUTER';
        $this->fixed = Helper::makeInteger($data['fixed']);
    }
}
