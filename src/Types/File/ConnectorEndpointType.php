<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Enums\File\ConnectorMagnetEnum;
use Turker\FigmaAPI\Types\AbstractType;
use Turker\FigmaAPI\Types\Common\VectorType;

class ConnectorEndpointType extends AbstractType
{
    public readonly string $endpointNodeId;
    public readonly VectorType $position;
    public readonly ConnectorMagnetEnum $magnet;

    public function __construct(array $data)
    {
        $this->endpointNodeId = $data['endpointNodeId'];
        $this->position = new VectorType($data['position']);
        $this->magnet = ConnectorMagnetEnum::tryFrom($data['magnet']);
    }
}
