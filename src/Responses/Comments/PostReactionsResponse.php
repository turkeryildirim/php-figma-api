<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Responses\Comments;

use Turker\FigmaAPI\Responses\BaseResponse;

final class PostReactionsResponse extends BaseResponse
{
    public readonly bool $status;

    public function __construct(array $data)
    {
        $this->status = !$data['error'];
        return $this;
    }
}
