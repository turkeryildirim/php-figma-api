<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Traits\BackgroundColorTrait;
use Turker\FigmaAPI\Traits\ChildrenTrait;
use Turker\FigmaAPI\Traits\IdTrait;
use Turker\FigmaAPI\Traits\NameTrait;
use Turker\FigmaAPI\Traits\ScrollBehaviorTrait;
use Turker\FigmaAPI\Traits\TypeTrait;
use Turker\FigmaAPI\Types\AbstractType;
use Turker\FigmaAPI\Util\Helper;

class CanvasNodeType extends AbstractType
{
    use IdTrait;
    use NameTrait;
    use TypeTrait;
    use ChildrenTrait;
    use BackgroundColorTrait;
    use ScrollBehaviorTrait;

    public readonly ?string $prototypeStartNodeID;
    public readonly ?FlowStartingPointsType $flowStartingPoints;
    public readonly ?PrototypeDeviceType $prototypeDevice;
    /**
     * @var MeasurementType[]|null
     */
    public readonly ?array $measurements;


    public function __construct(array $data)
    {
        $this->runTraitMethods($data);

        $this->prototypeStartNodeID = $data['prototypeStartNodeID'] ?? null;

        $this->flowStartingPoints = (!empty($data['flowStartingPoints'])) ?
            new FlowStartingPointsType($data['flowStartingPoints']) : null;

        $this->prototypeDevice = (!empty($data['prototypeDevice'])) ?
            new PrototypeDeviceType($data['prototypeDevice']) : null;

        $this->measurements = Helper::makeArrayOfObjects($data['measurements'], MeasurementType::class);
    }
}
