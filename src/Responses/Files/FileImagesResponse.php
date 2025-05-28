<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Responses\Files;

use Turker\FigmaAPI\Responses\BaseResponse;

final class FileImagesResponse extends BaseResponse
{
    public readonly ?array $images;
    public function __construct(?array $data)
    {
        $images = null;
        if (!empty($data)) {
            $images = [];
            foreach ($data as $node => $image) {
                $images[$node] = $image;
            }
        }
        $this->images = $images;
    }
}
