<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Traits\FillsTrait;
use Turker\FigmaAPI\Types\AbstractType;

class PaintOverrideType extends AbstractType
{
    use FillsTrait;

    public readonly string $inheritFillStyleId;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
        $this->inheritFillStyleId = $data['inheritFillStyleId'];
    }
}
