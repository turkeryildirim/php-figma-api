<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Enums\File\MediaActionTypeEnum;
use Turker\FigmaAPI\Traits\DestinationIdTrait;
use Turker\FigmaAPI\Traits\TypeTrait;
use Turker\FigmaAPI\Types\AbstractType;

class UpdateMediaRuntimeActionType extends AbstractType
{
    use TypeTrait;
    use DestinationIdTrait;

    public readonly ?MediaActionTypeEnum $mediaAction;
    public readonly int|float|null $amountToSkip;
    public readonly int|float|null $newTimestamp;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
        $this->mediaAction = ( !empty($data['mediaAction']) && MediaActionTypeEnum::hasValue($data['mediaAction']) )
            ? MediaActionTypeEnum::tryFrom($data['mediaAction']) : null;
        $this->amountToSkip = $data['amountToSkip'] ?? null;
        $this->newTimestamp = $data['newTimestamp'] ?? null;
    }
}
