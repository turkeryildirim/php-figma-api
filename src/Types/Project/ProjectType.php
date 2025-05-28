<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\Project;

use Turker\FigmaAPI\Traits\IdTrait;
use Turker\FigmaAPI\Traits\NameTrait;
use Turker\FigmaAPI\Types\AbstractType;

class ProjectType extends AbstractType
{
    use IdTrait;
    use NameTrait;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
    }
}
