<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Types\File\DocumentNodeType;

trait DocumentTrait
{
    public readonly ?DocumentNodeType $document;
    final protected function __document(array $data): void
    {
        $this->document = !empty($data['document']) ? new DocumentNodeType($data['document']) : null;
    }
}
