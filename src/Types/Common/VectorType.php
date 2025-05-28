<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\Common;

use Turker\FigmaAPI\Traits\XTrait;
use Turker\FigmaAPI\Traits\YTrait;
use Turker\FigmaAPI\Types\AbstractType;

class VectorType extends AbstractType
{
    use XTrait;
    use YTrait;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
    }
}
