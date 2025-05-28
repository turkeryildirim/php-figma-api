<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Traits\IdTrait;
use Turker\FigmaAPI\Types\AbstractType;

class MeasurementType extends AbstractType
{
    use IdTrait;

    public readonly ?string $freeText;
    public readonly ?MeasurementStartEndType $start;
    public readonly MeasurementOffsetInnerType|MeasurementOffsetOuterType $offset;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
        $this->freeText = $data['freeText'] ?? null;
        $this->start = (!empty($data['start'])) ? new MeasurementStartEndType($data['start']) : null;
        $this->offset = array_key_exists('fixed', $data['offset']) ?
            new MeasurementOffsetOuterType($data['offset']) : new MeasurementOffsetInnerType($data['offset']);
    }
}
