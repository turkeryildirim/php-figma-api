<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\Project;

use Turker\FigmaAPI\Traits\BranchesTrait;
use Turker\FigmaAPI\Traits\KeyTrait;
use Turker\FigmaAPI\Traits\LastModifiedTrait;
use Turker\FigmaAPI\Traits\NameTrait;
use Turker\FigmaAPI\Traits\ThumbnailUrlTrait;
use Turker\FigmaAPI\Types\AbstractType;

class ProjectFileType extends AbstractType
{
    use KeyTrait;
    use NameTrait;
    use ThumbnailUrlTrait;
    use BranchesTrait;
    use LastModifiedTrait;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
    }
}
