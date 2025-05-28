<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Responses\Users;

use Turker\FigmaAPI\Responses\BaseResponse;
use Turker\FigmaAPI\Types\User\UserType;

final class UserResponse extends BaseResponse
{
    /**
     * @var UserType
     */
    public readonly UserType $user;
    /**
     * @param array $data
     * @return UserResponse
     */

    public function __construct(array $data)
    {
        $this->user = new UserType($data);
        return $this;
    }
}
