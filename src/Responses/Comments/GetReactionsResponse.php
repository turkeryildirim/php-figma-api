<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Responses\Comments;

use Turker\FigmaAPI\Responses\BaseResponse;
use Turker\FigmaAPI\Types\Comment\ReactionType;
use Turker\FigmaAPI\Types\Common\PaginationType;

final class GetReactionsResponse extends BaseResponse
{
    /**
     * @var ReactionType[]|null
     */
    public readonly ?array $reactions;
    public readonly ?PaginationType $pagination;

    public function __construct(array $data)
    {
        $reactions = null;
        if (!empty($data['reactions'])) {
            $reactions = [];
            foreach ($data['reactions'] as $reaction) {
                $reactions[] = new ReactionType($reaction);
            }
        }
        $this->reactions = $reactions;

        $pagination = null;
        if (!empty($data['pagination'])) {
            $pagination = new PaginationType($data['pagination']);
        }
        $this->pagination = $pagination;
    }
}
