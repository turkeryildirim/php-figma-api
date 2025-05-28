<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Types\Comment\ReactionType;

trait ReactionsTrait
{
    /**
     * @var ReactionType[]|null
     */
    public readonly ?array $reactions;
    final protected function __reactions(array $data): void
    {
        $reactions = null;
        if (!empty($data['reactions']) && is_array($data['reactions'])) {
            $reactions = [];
            foreach ($data['reactions'] as $subData) {
                $reactions[] = new ReactionType($subData);
            }
        }
        $this->reactions = $reactions;
    }
}
