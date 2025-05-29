<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Responses\Styles;

use Turker\FigmaAPI\Responses\BaseResponse;
use Turker\FigmaAPI\Types\Style\StyleType;

final class StyleResponse extends BaseResponse
{
    public readonly int $status;
    public readonly bool $error;
    public readonly ?StyleType $meta;

    public function __construct(array $data)
    {
        $this->status = intval($data['status']);
        $this->error  = boolval($data['error']);

        $meta = null;
        if (!empty($data['meta'])) {
            $meta = new StyleType($data['meta']);
        }
        $this->meta = $meta;
        return $this;
    }
}
