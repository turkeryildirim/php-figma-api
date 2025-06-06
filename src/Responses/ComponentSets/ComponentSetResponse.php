<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Responses\ComponentSets;

use Turker\FigmaAPI\Responses\BaseResponse;
use Turker\FigmaAPI\Types\ComponentSet\ComponentSetType;
use Turker\FigmaAPI\Util\Helper;

final class ComponentSetResponse extends BaseResponse
{
    public readonly int|float|null $status;
    public readonly ?bool $error;
    public readonly ?ComponentSetType $meta;

    public function __construct(array $data)
    {
        $this->status = Helper::makeInteger($data['status']);
        $this->error  = Helper::makeBoolean($data['error']);
        $this->meta   = Helper::makeObject($data['meta'], ComponentSetType::class);
    }
}
