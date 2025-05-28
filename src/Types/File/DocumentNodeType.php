<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Traits\ChildrenTrait;
use Turker\FigmaAPI\Traits\IdTrait;
use Turker\FigmaAPI\Traits\NameTrait;
use Turker\FigmaAPI\Traits\ScrollBehaviorTrait;
use Turker\FigmaAPI\Traits\TypeTrait;
use Turker\FigmaAPI\Types\AbstractType;

class DocumentNodeType extends AbstractType
{
    use IdTrait;
    use NameTrait;
    use TypeTrait;
    use ScrollBehaviorTrait;
    use ChildrenTrait;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
    }
}
