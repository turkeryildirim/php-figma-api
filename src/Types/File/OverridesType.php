<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Traits\IdTrait;
use Turker\FigmaAPI\Types\AbstractType;

class OverridesType extends AbstractType
{
    use IdTrait;

    /**
     * @var string[]|null
     */
    public readonly ?array $overriddenFields;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
        $this->overriddenFields = $data['overriddenFields'] ?? null;
    }
}
