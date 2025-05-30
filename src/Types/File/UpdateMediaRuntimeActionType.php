<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Enums\File\MediaActionTypeEnum;
use Turker\FigmaAPI\Traits\DestinationIdTrait;
use Turker\FigmaAPI\Traits\TypeTrait;
use Turker\FigmaAPI\Types\AbstractType;
use Turker\FigmaAPI\Util\Helper;

class UpdateMediaRuntimeActionType extends AbstractType
{
    use TypeTrait;
    use DestinationIdTrait;

    public readonly ?string $mediaAction;
    public readonly int|float|null $amountToSkip;
    public readonly int|float|null $newTimestamp;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
        $this->mediaAction  = Helper::makeFromEnum($data['mediaAction'], MediaActionTypeEnum::class);
        $this->amountToSkip = Helper::makeInteger($data['amountToSkip']);
        $this->newTimestamp = Helper::makeInteger($data['newTimestamp']);
    }
}
