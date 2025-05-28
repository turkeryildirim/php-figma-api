<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Responses\Files;

use Turker\FigmaAPI\Responses\BaseResponse;
use Turker\FigmaAPI\Types\File\FileNodeType;

final class FileNodesResponse extends BaseResponse
{
    /**
     * @var FileNodeType[]|null
     */
    public readonly ?array $nodes;
    public function __construct(array $data)
    {
        $nodes = null;
        if (!empty($data['nodes'])) {
            $nodes = [];
            foreach ($data['nodes'] as $node) {
                $nodes[] = new FileNodeType($node);
            }
        }
        $this->nodes = $nodes;
    }
}
