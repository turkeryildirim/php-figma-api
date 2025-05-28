<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Responses\VersionHistory;

use Turker\FigmaAPI\Responses\BaseResponse;
use Turker\FigmaAPI\Types\Common\PaginationType;
use Turker\FigmaAPI\Types\VersionHistory\VersionHistoryType;

final class VersionHistoryResponse extends BaseResponse
{
    /**
     * @var VersionHistoryType[]|null
     */
    public readonly ?array $versions;

    public readonly ?PaginationType $pagination;

    public function __construct(array $data)
    {
        $versions = null;
        if (!empty($data['versions'])) {
            $versions = [];
            foreach ($data['versions'] as $version) {
                $versions[] = new VersionHistoryType($version);
            }
        }
        $this->versions = $versions;

        $pagination = null;
        if (!empty($data['pagination'])) {
            $pagination = new PaginationType($data['pagination']);
        }
        $this->pagination = $pagination;

        return $this;
    }
}
