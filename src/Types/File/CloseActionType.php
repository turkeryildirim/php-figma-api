<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Traits\TypeTrait;
use Turker\FigmaAPI\Types\AbstractType;

class CloseActionType extends AbstractType
{
    use TypeTrait;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
    }
}
