<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Responses\Projects;

use Turker\FigmaAPI\Responses\BaseResponse;
use Turker\FigmaAPI\Types\Project\ProjectType;
use Turker\FigmaAPI\Util\Helper;

final class ProjectsResponse extends BaseResponse
{
    public readonly string $name;
    /**
     * @var ProjectType[]|null
     */
    public readonly ?array $projects;

    public function __construct(array $data)
    {
        $this->name     = $data['name'];
        $this->projects = Helper::makeArrayOfObjects($data['projects'], ProjectType::class);
    }
}
