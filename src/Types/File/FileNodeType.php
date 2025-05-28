<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Traits\ComponentSetsTrait;
use Turker\FigmaAPI\Traits\ComponentsTrait;
use Turker\FigmaAPI\Traits\DocumentTrait;
use Turker\FigmaAPI\Traits\StylesTrait;
use Turker\FigmaAPI\Types\AbstractType;

class FileNodeType extends AbstractType
{
    use DocumentTrait;
    use ComponentsTrait;
    use ComponentSetsTrait;
    use StylesTrait;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
    }
}
