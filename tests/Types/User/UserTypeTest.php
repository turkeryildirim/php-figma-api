<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Tests\Types\User;

use Turker\FigmaAPI\Tests\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\User\UserType;
use TypeError;

final class UserTypeTest extends AbstractBaseTestCase
{
    public function testWithFullData(): void
    {
        $class = new UserType([ 'id' => 'id', 'handle' => 'handle', 'img_url' => 'img_url', 'email' => 'email' ]);
        $this->assertEquals('id', $class->id);
        $this->assertEquals('email', $class->email);
        $this->assertEquals('handle', $class->handle);
        $this->assertEquals('img_url', $class->imgUrl);
    }
    public function testWithMinData(): void
    {
        $class = new UserType(['id' => 'id']);
        $this->assertEquals('id', $class->id);
        $this->assertNull($class->email);
        $this->assertNull($class->handle);
        $this->assertNull($class->imgUrl);
    }
    public function testInvalidImgUrl()
    {
        $this->expectException(TypeError::class);
        new UserType(['id' => 'id','img_url' => 10]);
    }
    public function testInvalidEmail()
    {
        $this->expectException(TypeError::class);
        new UserType(['id' => 'id','email' => 10]);
    }
    public function testInvalidHandle()
    {
        $this->expectException(TypeError::class);
        new UserType(['id' => 'id','handle' => 10]);
    }
}
