<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Traits\CornerRadiusTrait;
use Turker\FigmaAPI\Traits\FillsTrait;
use Turker\FigmaAPI\Types\AbstractType;

class ConnectorTextBackgroundType extends AbstractType
{
    use CornerRadiusTrait;
    use FillsTrait;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
    }
}
