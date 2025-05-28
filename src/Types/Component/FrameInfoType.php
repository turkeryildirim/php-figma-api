<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\Component;

use Turker\FigmaAPI\Traits\BackgroundColorTrait;
use Turker\FigmaAPI\Traits\NameTrait;
use Turker\FigmaAPI\Traits\NodeIdTrait;
use Turker\FigmaAPI\Types\AbstractType;

class FrameInfoType extends AbstractType
{
    use NodeIdTrait;
    use NameTrait;
    use BackgroundColorTrait;

    public readonly ?string $pageId;
    public readonly ?string $pageName;
    public readonly ?string $containingComponentSet;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
        $this->pageId = $data['page_id'] ?? $data['pageId'] ?? null;
        $this->pageName = $data['page_name'] ?? $data['pageName'] ?? null;
        $this->containingComponentSet = $data['containing_component_set'] ?? null;
    }
}
