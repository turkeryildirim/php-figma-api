<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Traits\BranchesTrait;
use Turker\FigmaAPI\Traits\ComponentSetsTrait;
use Turker\FigmaAPI\Traits\ComponentsTrait;
use Turker\FigmaAPI\Traits\DocumentTrait;
use Turker\FigmaAPI\Traits\LastModifiedTrait;
use Turker\FigmaAPI\Traits\NameTrait;
use Turker\FigmaAPI\Traits\StylesTrait;
use Turker\FigmaAPI\Traits\ThumbnailUrlTrait;
use Turker\FigmaAPI\Types\AbstractType;

class FileType extends AbstractType
{
    use NameTrait;
    use BranchesTrait;
    use StylesTrait;
    use LastModifiedTrait;
    use ThumbnailUrlTrait;
    use ComponentsTrait;
    use ComponentSetsTrait;
    use DocumentTrait;

    public readonly ?string $role;
    public readonly ?string $version;
    public readonly ?string $mainFileKey;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);

        $this->role        = $data['role'] ?? null;
        $this->version     = $data['version'] ?? null;
        $this->mainFileKey = $data['mainFileKey'] ?? null;
    }
}
