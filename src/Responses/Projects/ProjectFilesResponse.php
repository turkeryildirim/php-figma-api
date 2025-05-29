<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Responses\Projects;

use Turker\FigmaAPI\Responses\BaseResponse;
use Turker\FigmaAPI\Types\Project\ProjectFileType;
use Turker\FigmaAPI\Util\Helper;

final class ProjectFilesResponse extends BaseResponse
{
    public readonly string $name;
    /**
     * @var ProjectFileType[]|null
     */
    public readonly ?array $files;

    public function __construct(array $data)
    {
        $this->name  = $data['name'];
        $this->files = Helper::makeArrayOfObjects($data['files'], ProjectFileType::class);
    }
}
