<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Enums\File\ConnectorMagnetEnum;
use Turker\FigmaAPI\Types\AbstractType;
use Turker\FigmaAPI\Types\Common\VectorType;
use Turker\FigmaAPI\Util\Helper;

class ConnectorEndpointType extends AbstractType
{
    public readonly string $endpointNodeId;
    public readonly VectorType $position;
    public readonly ?string $magnet;

    public function __construct(array $data)
    {
        $this->endpointNodeId = $data['endpointNodeId'];

        $this->position = Helper::makeObject(
            $data['position'],
            VectorType::class
        );

        $this->magnet = Helper::makeFromEnum($data['magnet'], ConnectorMagnetEnum::class);
    }
}
