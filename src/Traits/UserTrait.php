<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Traits;

use Turker\FigmaAPI\Types\User\UserType;

trait UserTrait
{
    public readonly UserType $user;
    final protected function __user(array $data): void
    {
        $this->user = new UserType($data['user']);
    }
}
