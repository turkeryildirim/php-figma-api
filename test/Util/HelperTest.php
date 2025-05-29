<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Util;

use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Util\Helper;
use TypeError;

final class HelperTest extends AbstractBaseTestCase
{
    public function testToHttpQueryWithNoParams(): void
    {
        $result = Helper::toHttpQuery('');
        $this->assertEquals('', $result);

        $result = Helper::toHttpQuery([]);
        $this->assertEquals('', $result);
    }
    public function testToHttpQueryWithParams(): void
    {
        $result = Helper::toHttpQuery('a=b&c=d');
        $this->assertEquals('?a=b&c=d', $result);

        $result = Helper::toHttpQuery(['a' => 'b','c' => 'd']);
        $this->assertEquals('?a=b&c=d', $result);
    }
    public function testToHttpQueryWithEmptyParams(): void
    {
        $result = Helper::toHttpQuery('a=b&c=d&e=&f=null');
        $this->assertEquals('?a=b&c=d&e=&f=null', $result);

        $result = Helper::toHttpQuery(['a' => 'b','c' => 'd','e' => '','f' => null]);
        $this->assertEquals('?a=b&c=d&e=&f=null', $result);
    }
    public function testToHttpQueryTypeException(): void
    {
        $this->expectException(TypeError::class);
        Helper::toHttpQuery(1);
    }
    public function testGetEnv()
    {
        $_SERVER['test'] = 'test';
        $this->assertEquals('test', Helper::getEnv('test'));

        $this->assertEquals('/bin/bash', Helper::getEnv('SHELL'));

        $this->assertNull(Helper::getEnv('testing'));
    }
    public function testGetEnvTypeException(): void
    {
        $this->expectException(TypeError::class);
        Helper::getEnv(1);
    }
    public function testStringToArrayMatrix(): void
    {
        $test  = '1,[2],3,4[,5,]6, 7   ,8, 9';
        $array = Helper::toArrayMatrix($test);
        $this->assertIsArray($array);
        $this->assertCount(3, $array);
        $this->assertEquals('1', $array[0][0]);
    }
    public function testInvalidStringToArrayMatrix(): void
    {
        $test = '12345';
        $this->assertNull(Helper::toArrayMatrix($test));

        $test = '1,[2],3,4[,5,]6, 7   ,8';
        $this->assertNull(Helper::toArrayMatrix($test));
    }
    public function testJsonEncode(): void
    {
        $str = 'abcdefghi';
        $this->assertEquals('"' . $str . '"', Helper::jsonEncode($str));

        $array = ['a' => 1, 'b' => 2, 'c' => 3];
        $json  = Helper::jsonEncode($array);
        $this->assertEquals('{"a":1,"b":2,"c":3}', $json);
    }
    public function testInvalidJsonEncode(): void
    {
        $str = "xB1\xB2\xB3";
        $this->assertNull(Helper::jsonEncode($str));
    }
    public function testJsonDecode(): void
    {
        $str   = '{"a":1,"b":2,"c":3}';
        $array = Helper::jsonDecode($str);
        $this->assertIsArray($array);
        $this->assertCount(3, $array);
        $this->assertEquals('1', $array['a']);
    }
    public function testInvalidJsonDecode(): void
    {
        $str   = "{'a': '1',}";
        $array = Helper::jsonDecode($str);
        $this->assertIsArray($array);
        $this->assertCount(0, $array);
    }
}
