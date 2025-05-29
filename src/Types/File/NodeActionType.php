<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Traits\DestinationIdTrait;
use Turker\FigmaAPI\Traits\TypeTrait;
use Turker\FigmaAPI\Types\AbstractType;
use Turker\FigmaAPI\Types\Common\VectorType;
use Turker\FigmaAPI\Util\Helper;

class NodeActionType extends AbstractType
{
    use TypeTrait;
    use DestinationIdTrait;

    public readonly ?NavigationType $navigation;
    public readonly SimpleTransitionType|DirectionalTransitionType|null $transition;
    public readonly bool $preserveScrollPosition;
    public readonly ?VectorType $overlayRelativePosition;
    public readonly bool $resetVideoPosition;
    public readonly bool $resetScrollPosition;
    public readonly bool $resetInteractiveComponents;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
        $this->resetInteractiveComponents = Helper::makeBoolean($data['resetInteractiveComponents'], false);
        $this->resetScrollPosition        = Helper::makeBoolean($data['resetScrollPosition'], false);
        $this->resetVideoPosition         = Helper::makeBoolean($data['resetVideoPosition'], false);
        $this->preserveScrollPosition     = Helper::makeBoolean($data['preserveScrollPosition'], false);

        $this->overlayRelativePosition = (!empty($data['overlayRelativePosition'])) ?
            new VectorType($data['overlayRelativePosition']) : null;

        $this->navigation = (!empty($data['navigation'])) ?
            new NavigationType($data['navigation']) : null;

        $transition = null;
        if (!empty($data['transition']) && !empty($data['transition']['direction'])) {
            $transition = new DirectionalTransitionType($data['transition']);
        } elseif (!empty($data['transition'])) {
            $transition = new SimpleTransitionType($data['transition']);
        }
        $this->transition = $transition;
    }
}
