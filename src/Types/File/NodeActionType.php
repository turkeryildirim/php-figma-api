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
    public readonly ?bool $preserveScrollPosition;
    public readonly ?VectorType $overlayRelativePosition;
    public readonly ?bool $resetVideoPosition;
    public readonly ?bool $resetScrollPosition;
    public readonly ?bool $resetInteractiveComponents;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
        $this->resetInteractiveComponents = Helper::makeBoolean($data['resetInteractiveComponents'], false);
        $this->resetScrollPosition        = Helper::makeBoolean($data['resetScrollPosition'], false);
        $this->resetVideoPosition         = Helper::makeBoolean($data['resetVideoPosition'], false);
        $this->preserveScrollPosition     = Helper::makeBoolean($data['preserveScrollPosition'], false);

        $this->overlayRelativePosition = Helper::makeObject(
            $data['overlayRelativePosition'],
            VectorType::class
        );

        $this->navigation = Helper::makeObject(
            $data['navigation'],
            NavigationType::class
        );

        $class = (!empty($data['transition']) && !empty($data['transition']['direction'])) ?
            DirectionalTransitionType::class : SimpleTransitionType::class;

        $this->transition = Helper::makeObject($data['transition'], $class);
    }
}
