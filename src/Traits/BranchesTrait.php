<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Types\Project\ProjectFileType;
use Turker\FigmaAPI\Util\Helper;

trait BranchesTrait
{
    /**
     * @var ProjectFileType[]|null
     */
    public readonly ?array $branches;
    final protected function __branches(array $data): void
    {
        $this->branches = Helper::makeArrayOfObjects($data['branches'], ProjectFileType::class);
    }
}
