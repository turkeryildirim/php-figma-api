<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Types\Comment\ReactionType;
use Turker\FigmaAPI\Util\Helper;

trait ReactionsTrait
{
    /**
     * @var ReactionType[]|null
     */
    public readonly ?array $reactions;
    final protected function __reactions(array $data): void
    {
        $this->reactions = Helper::makeArrayOfObjects($data['reactions'], ReactionType::class);
    }
}
