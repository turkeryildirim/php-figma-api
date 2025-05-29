<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Enums\File\DeviceTypeEnum;
use Turker\FigmaAPI\Enums\File\TriggerTypeEnum;
use Turker\FigmaAPI\Types\AbstractType;
use Turker\FigmaAPI\Util\Helper;

class TriggerType extends AbstractType
{
    public readonly TriggerTypeEnum $type;
    public readonly int|float|null $timeout;
    public readonly int|float|null $delay;
    public readonly bool $deprecatedVersion;
    public readonly ?DeviceTypeEnum $device;
    /**
     * @var int[]|float[]|null
     */
    public readonly ?array $keyCodes;
    public readonly int|float|null $mediaHitTime;

    public function __construct(array $data)
    {
        $this->type              = TriggerTypeEnum::tryFrom($data['type']);
        $this->timeout           = Helper::makeInteger($data['timeout']);
        $this->delay             = Helper::makeInteger($data['delay']);
        $this->deprecatedVersion = $data['deprecatedVersion'] ?? false;
        $this->mediaHitTime      = Helper::makeInteger($data['mediaHitTime']);
        $this->device            = ( !empty($data['device']) && DeviceTypeEnum::hasValue($data['device']) )
            ? DeviceTypeEnum::tryFrom($data['device']) : null;
        $this->keyCodes          = $data['keyCodes'] ?? null;
    }
}
