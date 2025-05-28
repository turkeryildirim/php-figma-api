<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\Comment;

use Turker\FigmaAPI\Types\AbstractType;
use Turker\FigmaAPI\Types\Common\VectorType;

class ClientMetaType extends AbstractType
{
    public readonly VectorType|FrameOffsetType|RegionType|FrameOffsetRegionType $clientMeta;
    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        if (isset($data['node_id'], $data['node_offset'], $data['region_height'])) {
            $this->clientMeta = new FrameOffsetRegionType($data);
        } elseif (isset($data['x'], $data['y'], $data['region_height'])) {
            $this->clientMeta = new RegionType($data);
        } elseif (isset($data['node_id'], $data['node_offset'])) {
            $this->clientMeta = new FrameOffsetType($data);
        } else {
            $this->clientMeta = new VectorType($data);
        }
    }

    public function __invoke(): FrameOffsetRegionType|RegionType|FrameOffsetType|VectorType
    {
        return $this->clientMeta;
    }
}
