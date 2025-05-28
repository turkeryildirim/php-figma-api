<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\Common;

use Turker\FigmaAPI\Types\AbstractType;

class PaginationType extends AbstractType
{
    public readonly ?string $prevPage;
    public readonly ?string $nextPage;

    public function __construct(array $data)
    {
        $this->nextPage = $data['next_page'] ?? null;
        $this->prevPage = $data['prev_page'] ?? null;
    }
}
