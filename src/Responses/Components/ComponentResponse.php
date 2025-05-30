<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Responses\Components;

use Turker\FigmaAPI\Responses\BaseResponse;
use Turker\FigmaAPI\Types\Component\ComponentType;
use Turker\FigmaAPI\Util\Helper;

final class ComponentResponse extends BaseResponse
{
    public readonly int|float|null $status;
    public readonly ?bool $error;
    public readonly ?ComponentType $meta;

    public function __construct(array $data)
    {
        $this->status = Helper::makeInteger($data['status']);
        $this->error  = Helper::makeBoolean($data['error']);
        $this->meta   = Helper::makeObject($data['meta'], ComponentType::class);
    }
}
