<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Responses\Styles;

use Turker\FigmaAPI\Responses\BaseResponse;
use Turker\FigmaAPI\Types\Style\StyleType;
use Turker\FigmaAPI\Util\Helper;

final class FileStylesResponse extends BaseResponse
{
    public readonly int|float $status;
    public readonly bool $error;
    /**
     * @var array{styles: StyleType[]}|null $meta
     */
    public readonly ?array $meta;

    public function __construct(array $data)
    {
        $this->status = Helper::makeInteger($data['status']);
        $this->error  = Helper::makeBoolean($data['error']);

        $meta = null;
        if (!empty($data['meta']) && !empty($data['meta']['styles'])) {
            $meta['styles'] = Helper::makeArrayOfObjects($data['meta']['styles'], StyleType::class);
        }
        $this->meta = $meta;
        return $this;
    }
}
