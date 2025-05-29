<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Responses\VersionHistory;

use Turker\FigmaAPI\Responses\BaseResponse;
use Turker\FigmaAPI\Types\Common\PaginationType;
use Turker\FigmaAPI\Types\VersionHistory\VersionHistoryType;
use Turker\FigmaAPI\Util\Helper;

final class VersionHistoryResponse extends BaseResponse
{
    /**
     * @var VersionHistoryType[]|null
     */
    public readonly ?array $versions;

    public readonly ?PaginationType $pagination;

    public function __construct(array $data)
    {
        $this->versions = Helper::makeArrayOfObjects($data['versions'], VersionHistoryType::class);

        $pagination = null;
        if (!empty($data['pagination'])) {
            $pagination = new PaginationType($data['pagination']);
        }
        $this->pagination = $pagination;

        return $this;
    }
}
