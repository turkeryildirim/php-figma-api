<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Endpoints;

use Turker\FigmaAPI\Responses\Users\UserResponse;

/**
 * https://www.figma.com/developers/api#users
 */
final class UsersEndpoint extends BaseEndpoint
{
    public function me(): UserResponse
    {
        $data = $this->client->get('me');
        return UserResponse::build($data);
    }
}
