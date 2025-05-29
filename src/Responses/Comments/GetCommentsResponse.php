<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Responses\Comments;

use Turker\FigmaAPI\Responses\BaseResponse;
use Turker\FigmaAPI\Types\Comment\CommentType;
use Turker\FigmaAPI\Util\Helper;

final class GetCommentsResponse extends BaseResponse
{
    /**
     * @var CommentType[]|null
     */
    public readonly ?array $comments;

    public function __construct(array $data)
    {
        $this->comments = Helper::makeArrayOfObjects($data['comments'], CommentType::class);
    }
}
