<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Responses\Styles;

use Turker\FigmaAPI\Responses\BaseResponse;
use Turker\FigmaAPI\Types\Common\CursorType;
use Turker\FigmaAPI\Types\Style\StyleType;
use Turker\FigmaAPI\Util\Helper;

final class TeamStylesResponse extends BaseResponse
{
    public readonly int|float|null $status;
    public readonly ?bool $error;
    /**
     * @var array{cursor: CursorType, styles: StyleType[]}|null $meta
     */
    public readonly ?array $meta;

    public function __construct(array $data)
    {
        $this->status = Helper::makeInteger($data['status']);
        $this->error  = Helper::makeBoolean($data['error']);

        $meta = null;
        if (!empty($data['meta'])) {
            $meta           = [];
            $meta['cursor'] = null;
            if (!empty($data['meta']['cursor'])) {
                $meta['cursor'] = new CursorType($data['meta']['cursor']);
            }
            $meta['styles'] = Helper::makeArrayOfObjects($data['meta']['styles'], StyleType::class);
        }
        $this->meta = $meta;
    }
}
