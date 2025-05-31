<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Enums\File\PrototypeDeviceTypeEnum;
use Turker\FigmaAPI\Enums\File\RotationEnum;
use Turker\FigmaAPI\Enums\File\SizeEnum;
use Turker\FigmaAPI\Types\AbstractType;
use Turker\FigmaAPI\Util\Helper;

class PrototypeDeviceType extends AbstractType
{
    public readonly ?string $presetIdentifier;
    public readonly ?string $type;
    public readonly ?string $rotation;
    public readonly ?string $size;

    public function __construct(array $data)
    {
        $this->presetIdentifier = $data['presetIdentifier'] ?? null;

        $this->type     = Helper::makeFromEnum($data['type'], PrototypeDeviceTypeEnum::class, 'NONE');
        $this->rotation = Helper::makeFromEnum($data['rotation'], RotationEnum::class);
        $this->size     = Helper::makeFromEnum($data['size'], SizeEnum::class);
    }
}
