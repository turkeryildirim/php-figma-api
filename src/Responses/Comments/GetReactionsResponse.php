<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Responses\Comments;

use Turker\FigmaAPI\Responses\BaseResponse;
use Turker\FigmaAPI\Types\Comment\ReactionType;
use Turker\FigmaAPI\Types\Common\PaginationType;
use Turker\FigmaAPI\Util\Helper;

final class GetReactionsResponse extends BaseResponse
{
    /**
     * @var ReactionType[]|null
     */
    public readonly ?array $reactions;
    public readonly ?PaginationType $pagination;

    public function __construct(array $data)
    {
        $this->reactions = Helper::makeArrayOfObjects($data['reactions'], ReactionType::class);

        $pagination = null;
        if (!empty($data['pagination'])) {
            $pagination = new PaginationType($data['pagination']);
        }
        $this->pagination = $pagination;
    }
}
