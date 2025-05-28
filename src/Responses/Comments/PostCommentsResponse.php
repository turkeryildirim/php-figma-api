<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Responses\Comments;

use Turker\FigmaAPI\Responses\BaseResponse;
use Turker\FigmaAPI\Types\Comment\CommentType;

final class PostCommentsResponse extends BaseResponse
{
    /**
     * @var CommentType
     */
    public readonly CommentType $comment;

    public function __construct(array $data)
    {
        $this->comment = new CommentType($data);
        return $this;
    }
}
