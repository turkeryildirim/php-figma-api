<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Tests\Endpoints;

use Turker\FigmaAPI\Endpoints\UsersEndpoint;
use Turker\FigmaAPI\Responses\Users\UserResponse;
use Turker\FigmaAPI\Tests\AbstractBaseTestCase;
use Turker\FigmaAPI\Tests\ResponseMockData;
use Turker\FigmaAPI\Types\User\UserType;

final class UsersTest extends AbstractBaseTestCase
{
    public function testMeEndpoint(): void
    {
        $this->successResponse(ResponseMockData::USER);
        $response = new UsersEndpoint($this->httpClient);
        $user     = $response->me();

        $this->assertInstanceOf(UsersEndpoint::class, $response);
        $this->assertInstanceOf(UserResponse::class, $user);
        $this->assertInstanceOf(UserType::class, $user->user);

        $this->assertEquals('email', $user->user->email);
        $this->assertEquals('id', $user->user->id);
        $this->assertEquals('handle', $user->user->handle);
        $this->assertEquals('img_url', $user->user->imgUrl);
    }
}
