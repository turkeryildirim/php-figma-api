<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Traits\AbsoluteBoundingBoxTrait;
use Turker\FigmaAPI\Traits\AbsoluteRenderBoundsTrait;
use Turker\FigmaAPI\Traits\ChildrenTrait;
use Turker\FigmaAPI\Traits\DevStatusTrait;
use Turker\FigmaAPI\Traits\FillsTrait;
use Turker\FigmaAPI\Traits\IdTrait;
use Turker\FigmaAPI\Traits\StrokeAlignTrait;
use Turker\FigmaAPI\Traits\StrokesTrait;
use Turker\FigmaAPI\Traits\StrokeWeightTrait;
use Turker\FigmaAPI\Types\AbstractType;

class SectionNodeType extends AbstractType
{
    use IdTrait;
    use DevStatusTrait;
    use FillsTrait;
    use StrokesTrait;
    use StrokeWeightTrait;
    use StrokeAlignTrait;
    use ChildrenTrait;
    use AbsoluteRenderBoundsTrait;
    use AbsoluteBoundingBoxTrait;

    public readonly bool $sectionContentsHidden;
    public readonly ?array $children;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
        $this->sectionContentsHidden = $data['sectionContentsHidden'] ?? false;
    }
}
