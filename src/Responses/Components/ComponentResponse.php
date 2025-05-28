<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Responses\Components;

use Turker\FigmaAPI\Responses\BaseResponse;
use Turker\FigmaAPI\Types\Component\ComponentType;

final class ComponentResponse extends BaseResponse
{
    public readonly int $status;
    public readonly bool $error;
    public readonly ?ComponentType $meta;

    public function __construct(array $data)
    {
        $this->status = intval($data['status']);
        $this->error = boolval($data['error']);
        $meta = null;
        if (!empty($data['meta'])) {
            $meta = new ComponentType($data['meta']);
        }

        $this->meta = $meta;
        return $this;
    }
}
