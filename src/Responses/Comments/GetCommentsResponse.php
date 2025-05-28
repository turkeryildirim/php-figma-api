<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Responses\Comments;

use Turker\FigmaAPI\Responses\BaseResponse;
use Turker\FigmaAPI\Types\Comment\CommentType;

final class GetCommentsResponse extends BaseResponse
{
    /**
     * @var CommentType[]|null
     */
    public readonly ?array $comments;

    public function __construct(array $data)
    {
        $comments = null;
        if (!empty($data['comments'])) {
            $comments = [];
            foreach ($data['comments'] as $comment) {
                $comments[] = new CommentType($comment);
            }
        }
        $this->comments = $comments;
    }
}
