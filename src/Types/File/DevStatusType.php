<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Enums\File\DevStatusTypeEnum;
use Turker\FigmaAPI\Traits\DescriptionTrait;
use Turker\FigmaAPI\Types\AbstractType;
use Turker\FigmaAPI\Util\Helper;

class DevStatusType extends AbstractType
{
    use DescriptionTrait;

    public readonly ?string $type;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
        $this->type = Helper::makeFromEnum($data['type'], DevStatusTypeEnum::class);
    }
}
