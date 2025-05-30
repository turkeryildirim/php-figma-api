<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Responses\Files;

use Turker\FigmaAPI\Responses\BaseResponse;
use Turker\FigmaAPI\Types\File\FileType;

final class FilesResponse extends BaseResponse
{
    public readonly FileType $file;
    public function __construct(array $data)
    {
        $this->file = new FileType($data);
    }
}
