<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Responses\Files;

use Turker\FigmaAPI\Responses\BaseResponse;
use Turker\FigmaAPI\Types\File\FileNodeType;
use Turker\FigmaAPI\Util\Helper;

final class FileNodesResponse extends BaseResponse
{
    /**
     * @var FileNodeType[]|null
     */
    public readonly ?array $nodes;
    public function __construct(array $data)
    {
        $this->nodes = Helper::makeArrayOfObjects($data['nodes'], FileNodeType::class);
    }
}
