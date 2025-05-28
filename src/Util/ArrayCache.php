<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Util;

use DateInterval;
use DateTime;
use InvalidArgumentException;
use Psr\SimpleCache\CacheInterface;
use Traversable;

final class ArrayCache implements CacheInterface
{
    private array $cache = [];

    public function set(string $key, mixed $value, int|DateInterval|null $ttl = null): bool
    {
        if (empty($key)) {
            throw new InvalidArgumentException('The key must be a string.');
        }

        $this->cache[$key] = ['ttl' => $this->getTTL($ttl), 'content' => $value];

        return true;
    }
    public function get(string $key, mixed $default = null): mixed
    {
        if (empty($key)) {
            throw new InvalidArgumentException('The key must be a string.');
        }

        if (isset($this->cache[$key])) {
            if ($this->cache[$key]['ttl'] === null || $this->cache[$key]['ttl'] > time()) {
                return $this->cache[$key]['content'];
            }

            unset($this->cache[$key]);
        }

        return $default;
    }
    public function has(string $key): bool
    {
        return $this->get($key) !== null;
    }
    public function delete(string $key): bool
    {
        if (empty($key)) {
            throw new InvalidArgumentException('The key must be a string.');
        }
        unset($this->cache[$key]);

        return true;
    }
    public function clear(): bool
    {
        $this->cache = [];

        return true;
    }
    public function setMultiple(iterable $values, int|DateInterval|null $ttl = null): bool
    {
        if ($values instanceof Traversable) {
            $values = iterator_to_array($values);
        }

        if (empty($values)) {
            throw new InvalidArgumentException('The values must be an iterable.');
        }

        foreach ($values as $key => $value) {
            $this->set($key, $value, $ttl);
        }

        return true;
    }
    public function getMultiple(iterable $keys, mixed $default = null): array
    {
        if ($keys instanceof Traversable) {
            $keys = iterator_to_array($keys);
        }

        if (empty($keys)) {
            throw new InvalidArgumentException('The keys must be an iterable.');
        }

        $results = [];
        foreach ($keys as $key) {
            $results[$key] = $this->get($key, $default);
        }

        return $results;
    }
    public function deleteMultiple(iterable $keys): bool
    {
        if (empty($keys)) {
            throw new InvalidArgumentException('The keys must be an iterable.');
        }

        if ($keys instanceof Traversable) {
            $keys = iterator_to_array($keys);
        }

        foreach ($keys as $key) {
            $this->delete($key);
        }

        return true;
    }
    protected function getTTL(DateInterval|int|null $ttl): ?int
    {
        if ($ttl instanceof DateInterval) {
            return ((new DateTime())->add($ttl)->getTimeStamp());
        }

        if ((is_int($ttl) && $ttl > 0)) {
            return time() + $ttl;
        }

        return null;
    }
}
