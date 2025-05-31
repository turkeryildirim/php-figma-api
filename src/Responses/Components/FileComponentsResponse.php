<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Responses\Components;

use Turker\FigmaAPI\Responses\BaseResponse;
use Turker\FigmaAPI\Types\Common\CursorType;
use Turker\FigmaAPI\Types\Component\ComponentType;
use Turker\FigmaAPI\Util\Helper;

final class FileComponentsResponse extends BaseResponse
{
    public readonly int|float|null $status;
    public readonly ?bool $error;
    public readonly ?array $meta;

    public function __construct(array $data)
    {
        $this->status = Helper::makeInteger($data['status']);
        $this->error  = Helper::makeBoolean($data['error']);

        $meta = null;
        if (!empty($data['meta'])) {
            $meta['cursor'] = null;
            if (!empty($data['meta']['cursor'])) {
                $meta['cursor'] = new CursorType($data['meta']['cursor']);
            }
            $meta['components'] = Helper::makeArrayOfObjects($data['meta']['components'], ComponentType::class);
        }

        $this->meta = $meta;
    }
}
