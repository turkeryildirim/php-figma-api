<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\Component;

use Turker\FigmaAPI\Traits\CreatedAtTrait;
use Turker\FigmaAPI\Traits\DescriptionTrait;
use Turker\FigmaAPI\Traits\FileKeyTrait;
use Turker\FigmaAPI\Traits\KeyTrait;
use Turker\FigmaAPI\Traits\NameTrait;
use Turker\FigmaAPI\Traits\NodeIdTrait;
use Turker\FigmaAPI\Traits\ThumbnailUrlTrait;
use Turker\FigmaAPI\Traits\UpdatedAtTrait;
use Turker\FigmaAPI\Traits\UserTrait;
use Turker\FigmaAPI\Types\AbstractType;
use Turker\FigmaAPI\Util\Helper;

class ComponentType extends AbstractType
{
    use KeyTrait;
    use FileKeyTrait;
    use NodeIdTrait;
    use ThumbnailUrlTrait;
    use NameTrait;
    use DescriptionTrait;
    use CreatedAtTrait;
    use UpdatedAtTrait;
    use UserTrait;

    public readonly ?FrameInfoType $containingFrame;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
        $this->containingFrame = Helper::makeObject(
            $data['containing_frame'],
            FrameInfoType::class
        );
    }
}
