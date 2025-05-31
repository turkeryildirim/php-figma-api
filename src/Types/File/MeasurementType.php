<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Traits\IdTrait;
use Turker\FigmaAPI\Types\AbstractType;
use Turker\FigmaAPI\Util\Helper;

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

        $this->start = Helper::makeObject(
            $data['start'],
            MeasurementStartEndType::class
        );

        $class = array_key_exists('fixed', $data['offset']) ?
            MeasurementOffsetOuterType::class : MeasurementOffsetInnerType::class;

        $this->offset = Helper::makeObject($data['offset'], $class);
    }
}
