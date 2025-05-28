<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\VersionHistory;

use Turker\FigmaAPI\Traits\CreatedAtTrait;
use Turker\FigmaAPI\Traits\DescriptionTrait;
use Turker\FigmaAPI\Traits\IdTrait;
use Turker\FigmaAPI\Traits\UserTrait;
use Turker\FigmaAPI\Types\AbstractType;

class VersionHistoryType extends AbstractType
{
    use IdTrait;
    use CreatedAtTrait;
    use DescriptionTrait;
    use UserTrait;

    public readonly ?string $label;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
        $this->label = $data['label'] ?? null;
    }
}
