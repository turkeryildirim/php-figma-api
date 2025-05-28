<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Enums\File\PrototypeDeviceTypeEnum;
use Turker\FigmaAPI\Enums\File\RotationEnum;
use Turker\FigmaAPI\Enums\File\SizeEnum;
use Turker\FigmaAPI\Types\AbstractType;

class PrototypeDeviceType extends AbstractType
{
    public readonly ?string $presetIdentifier;
    public readonly PrototypeDeviceTypeEnum $type;
    public readonly ?RotationEnum $rotation;
    public readonly ?SizeEnum $size;

    public function __construct(array $data)
    {
        $this->presetIdentifier = $data['presetIdentifier'] ?? null;

        $this->type = ( isset($data['type']) && PrototypeDeviceTypeEnum::hasValue($data['type']) )
            ? PrototypeDeviceTypeEnum::tryFrom($data['type']) : PrototypeDeviceTypeEnum::from('NONE');

        $this->rotation = ( isset($data['rotation']) && RotationEnum::hasValue($data['rotation']) )
            ? RotationEnum::tryFrom($data['rotation']) : null;

        $this->size = ( isset($data['size']) && SizeEnum::hasValue($data['size']) )
            ? SizeEnum::tryFrom($data['size']) : null;
    }
}
