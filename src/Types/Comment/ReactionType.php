<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Types\Comment;

use Turker\FigmaAPI\Traits\CreatedAtTrait;
use Turker\FigmaAPI\Traits\UserTrait;
use Turker\FigmaAPI\Types\AbstractType;

class ReactionType extends AbstractType
{
    use UserTrait;
    use CreatedAtTrait;

    public readonly string $emoji;

    public function __construct(array $data)
    {
        $this->runTraitMethods($data);
        $this->emoji = $data['emoji'];
    }
}
