<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Responses\Comments;

use Turker\FigmaAPI\Responses\BaseResponse;
use Turker\FigmaAPI\Util\Helper;

final class DeleteReactionsResponse extends BaseResponse
{
    public readonly ?bool $status;

    public function __construct(array $data)
    {
        $this->status = !Helper::makeBoolean($data['error']);
    }
}
