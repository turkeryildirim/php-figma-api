<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Types\Project\ProjectFileType;

trait BranchesTrait
{
    /**
     * @var ProjectFileType[]|null
     */
    public readonly ?array $branches;
    final protected function __branches(array $data): void
    {
        $branches = null;
        if (!empty($data['branches']) && is_array($data['branches'])) {
            $branches = [];
            foreach ($data['branches'] as $value) {
                $branches[] = new ProjectFileType($value);
            }
        }
        $this->branches = $branches;
    }
}
