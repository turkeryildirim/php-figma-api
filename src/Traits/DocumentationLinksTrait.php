<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Util\Helper;

trait DocumentationLinksTrait
{
    public readonly ?array $documentationLinks;
    final protected function __documentationLinks(array $data): void
    {
        $documentationLinks = null;
        if (!empty($data['documentationLinks']) && is_array($data['documentationLinks'])) {
            $documentationLinks = [];
            foreach ($data['documentationLinks'] as $link) {
                $documentationLinks[] = $link['url'];
            }
        }
        $this->documentationLinks = $documentationLinks;
    }
}
