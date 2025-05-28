<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\File;

use Turker\FigmaAPI\Traits\TypeTrait;
use Turker\FigmaAPI\Types\AbstractType;

class OpenUrlActionType extends AbstractType
{
    use TypeTrait;

    public readonly string $url;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
        $this->url = $data['url'];
    }
}
