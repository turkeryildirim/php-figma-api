<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Responses\Users;

use Turker\FigmaAPI\Responses\BaseResponse;
use Turker\FigmaAPI\Types\User\UserType;

final class UserResponse extends BaseResponse
{
    public readonly UserType $user;

    public function __construct(array $data)
    {
        $this->user = new UserType($data);
    }
}
