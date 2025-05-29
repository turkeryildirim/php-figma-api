<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Util;

use ArrayObject;
use InvalidArgumentException;
use ReflectionClass;
use Turker\FigmaAPI\Test\AbstractBaseTestCase;
use Turker\FigmaAPI\Util\ArrayCache;
use TypeError;

final class ArrayCacheTest extends AbstractBaseTestCase
{
    private ArrayCache $cache;

    protected function setUp(): void
    {
        parent::setUp();
        $this->cache = new ArrayCache();
        $this->cache->set('key1', 'value1');
        $this->cache->set('key2', 'value2');
    }
    public function testGetWithNonExistantKey()
    {
        $this->assertNull($this->cache->get('a'));
    }
    public function testGet()
    {
        $this->assertEquals('value1', $this->cache->get('key1'));
    }
    public function testHas()
    {
        $this->assertTrue($this->cache->has('key1'));
    }
    public function testDelete()
    {
        $this->cache->delete('key1');
        $this->assertFalse($this->cache->has('key1'));
    }
    public function testClear()
    {
        $this->cache->clear();
        $this->assertFalse($this->cache->has('key1'));
        $this->assertFalse($this->cache->has('key2'));
    }
    public function testSetMultiple()
    {
        $this->cache->setMultiple(['key3' => 'value3', 'key4' => 'value4']);
        $this->assertTrue($this->cache->has('key3'));
        $this->assertTrue($this->cache->has('key4'));
        $this->assertEquals('value3', $this->cache->get('key3'));
        $this->assertEquals('value4', $this->cache->get('key4'));
    }
    public function testGetMultiple()
    {
        $values = $this->cache->getMultiple(['key1', 'key2']);
        $this->assertArrayHasKey('key1', $values);
        $this->assertArrayHasKey('key2', $values);
        $this->assertEquals('value1', $values['key1']);
        $this->assertEquals('value2', $values['key2']);
    }
    public function testDeleteMultiple()
    {
        $this->cache->set('key3', 'value3');
        $this->cache->deleteMultiple(['key1', 'key3']);
        $this->assertTrue($this->cache->has('key2'));
        $this->assertFalse($this->cache->has('key1'));
        $this->assertFalse($this->cache->has('key3'));
    }
    public function testGetWithDefault()
    {
        $this->assertEquals('value5', $this->cache->get('key5', 'value5'));
        $this->assertFalse($this->cache->has('key5'));
    }
    public function testGetMultipleWithDefault()
    {
        $values = $this->cache->getMultiple(['key3', 'key4'], 'test');
        $this->assertArrayHasKey('key3', $values);
        $this->assertArrayHasKey('key4', $values);
        $this->assertEquals('test', $values['key3']);
        $this->assertEquals('test', $values['key4']);
        $this->assertFalse($this->cache->has('key3'));
        $this->assertFalse($this->cache->has('key4'));
    }
    public function testSetWithTTL()
    {
        $ttl = time() + 3600;
        $this->cache->set('key3', 'value3', 3600);

        $reflection = new ReflectionClass($this->cache);
        $property   = $reflection->getProperty('cache');
        $property->setAccessible(true);

        $cache = $property->getValue($this->cache);
        $this->assertArrayHasKey('key3', $cache);
        $this->assertNotNull($cache['key3']['ttl']);
        $this->assertEquals($cache['key3']['ttl'], $ttl);
    }

    public function testSetMultipleWithTTL()
    {
        $ttl = time() + 3600;
        $this->cache->setMultiple(['key3' => 'value3', 'key4' => 'value4'], 3600);

        $reflection = new ReflectionClass($this->cache);
        $property   = $reflection->getProperty('cache');
        $property->setAccessible(true);

        $cache = $property->getValue($this->cache);

        $this->assertArrayHasKey('key3', $cache);
        $this->assertNotNull($cache['key3']['ttl']);
        $this->assertEquals($cache['key3']['ttl'], $ttl);

        $this->assertArrayHasKey('key4', $cache);
        $this->assertNotNull($cache['key4']['ttl']);
        $this->assertEquals($cache['key4']['ttl'], $ttl);
    }
    public function testSetWithInvalidKey()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->cache->set('', '1');
    }
    public function testSetWithInvalidTypeKey()
    {
        $this->expectException(TypeError::class);
        $this->cache->set(1, '1');
    }
    public function testGetWithInvalidTypeKey()
    {
        $this->expectException(TypeError::class);
        $this->cache->get(1);
    }
    public function testGetWithInvalidKey()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->cache->get('');
    }
    public function testDeleteWithInvalidTypeKey()
    {
        $this->expectException(TypeError::class);
        $this->cache->delete(1);
    }
    public function testDeleteWithInvalidKey()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->cache->delete('');
    }
    public function testSetMultipleWithInvalidTypeKey()
    {
        $this->expectException(TypeError::class);
        $this->cache->setMultiple([1 => '1']);
    }
    public function testSetMultipleWithInvalidKey()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->cache->setMultiple([]);
    }
    public function testGetMultipleWithInvalidTypeKey()
    {
        $this->expectException(TypeError::class);
        $this->cache->getMultiple([1, '1']);
    }
    public function testGetMultipleWithInvalidKey()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->cache->getMultiple([]);
    }
    public function testDeleteMultipleWithInvalidTypeKey()
    {
        $this->expectException(TypeError::class);
        $this->cache->deleteMultiple([1,'1']);
    }
    public function testDeleteMultipleWithInvalidKey()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->cache->deleteMultiple([]);
    }
    public function testSetMultipleWithIterator()
    {
        $data     = ['key3' => 'value3', 'key4' => 'value4'];
        $iterator = new ArrayObject($data);
        $this->cache->setMultiple($iterator->getIterator());

        $this->assertTrue($this->cache->has('key3'));
        $this->assertEquals('value3', $this->cache->get('key3'));

        $this->assertTrue($this->cache->has('key4'));
        $this->assertEquals('value4', $this->cache->get('key4'));
    }

    public function testGetMultipleWithIterator()
    {
        $this->cache->set('key3', 'value3');
        $this->cache->set('key4', 'value4');

        $keys     = ['key3', 'key4'];
        $iterator = new ArrayObject($keys);
        $result   = $this->cache->getMultiple($iterator->getIterator());

        $this->assertTrue($this->cache->has('key3'));
        $this->assertEquals('value3', $result['key3']);

        $this->assertTrue($this->cache->has('key4'));
        $this->assertEquals('value4', $result['key4']);
    }
}
