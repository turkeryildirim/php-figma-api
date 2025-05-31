<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Tests\Util;

use Turker\FigmaAPI\Enums\Style\StyleTypeEnum;
use Turker\FigmaAPI\Tests\AbstractBaseTestCase;
use Turker\FigmaAPI\Types\Common\CursorType;
use Turker\FigmaAPI\Types\Common\VectorType;
use Turker\FigmaAPI\Types\File\StyleType;
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
    public function testMakeInteger(): void
    {
        $number = Helper::makeInteger("1");
        $this->assertEquals('1', $number);
    }
    public function testMakeIntegerWithDefault(): void
    {
        $number = Helper::makeInteger([], 5);
        $this->assertEquals('5', $number);
    }
    public function testInvalidMakeInteger(): void
    {
        $number = Helper::makeInteger("1as");
        $this->assertNull($number);

        $number = Helper::makeInteger("asdasd");
        $this->assertNull($number);
    }
    public function testInvalidMakeIntegerWithDefault(): void
    {
        $this->expectException(TypeError::class);
        Helper::makeInteger([], '5');
    }
    public function testMakeBoolean(): void
    {
        $bool = Helper::makeBoolean("true");
        $this->assertTrue($bool);
    }
    public function testMakeBooleanWithDefault(): void
    {
        $bool = Helper::makeBoolean("aaa", false);
        $this->assertFalse($bool);
    }
    public function testInvalidMakeBoolean(): void
    {
        $bool = Helper::makeBoolean("asd");
        $this->assertNull($bool);
    }
    public function testInvalidMakeBooleanWithDefault(): void
    {
        $this->expectException(TypeError::class);
        Helper::makeBoolean("aaa", 5);
    }
    public function testMakeArrayOfObjects()
    {
        $array = Helper::makeArrayOfObjects(
            [['x' => 5, 'y' => 6],['x' => 7, 'y' => 8]],
            VectorType::class
        );
        $this->assertInstanceOf(VectorType::class, $array[0]);
        $this->assertEquals('7', $array[1]->x);
    }
    public function testMakeArrayOfObjects2()
    {
        $array = Helper::makeArrayOfObjects(
            [['x' => null, 'y' => null],['x' => null, 'y' => null]],
            CursorType::class
        );
        $this->assertNull($array);
    }
    public function testInvalidMakeArrayOfObjects()
    {
        $array = Helper::makeArrayOfObjects(['a'], VectorType::class);
        $this->assertNull($array);
    }
    public function testInvalidMakeArrayOfObjects2()
    {
        $array = Helper::makeArrayOfObjects(['a'], '');
        $this->assertNull($array);
    }
    public function testMakeObject()
    {
        $obj = Helper::makeObject(['x' => 7, 'y' => 8], VectorType::class);
        $this->assertInstanceOf(VectorType::class, $obj);
        $this->assertEquals('7', $obj->x);
    }
    public function testInvalidMakeObject()
    {
        $obj = Helper::makeObject(['a' => 'b'], VectorType::class);
        $this->assertInstanceOf(VectorType::class, $obj);
        $this->assertEquals('0', $obj->x);
    }
    public function testInvalidMakeObject2()
    {
        $this->expectException(TypeError::class);
        Helper::makeObject(['a' => 'b'], StyleType::class);
    }
    public function testInvalidMakeObject3()
    {
        $obj = Helper::makeObject(['a' => 'b'], '');
        $this->assertNull($obj);
    }
    public function testMakeFromEnum()
    {
        $val = Helper::makeFromEnum('GRID', StyleTypeEnum::class);
        $this->assertEquals('GRID', $val);
    }
    public function testMakeFromEnumWithDefault()
    {
        $val = Helper::makeFromEnum('aaa', StyleTypeEnum::class, 'GRID');
        $this->assertEquals('GRID', $val);
    }
    public function testInvalidMakeFromEnum()
    {
        $val = Helper::makeFromEnum('', StyleTypeEnum::class);
        $this->assertNull($val);
    }
    public function testInvalidMakeFromEnum2()
    {
        $val = Helper::makeFromEnum('GRID', '');
        $this->assertNull($val);
    }
    public function testInvalidMakeFromEnum3()
    {
        $val = Helper::makeFromEnum('GRID', 'GRID');
        $this->assertNull($val);
    }
    public function testInvalidMakeFromEnum4()
    {
        $val = Helper::makeFromEnum('aaaa', StyleTypeEnum::class);
        $this->assertNull($val);
    }
}
