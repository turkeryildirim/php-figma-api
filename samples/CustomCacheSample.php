<?php

declare(strict_types=1);

require_once '../vendor/autoload.php';

use Turker\FigmaAPI\Endpoints\VersionHistoryEndpoint;
use Turker\FigmaAPI\FigmaClient;
use Cache\Adapter\Redis\RedisCachePool;
use Cache\Bridge\SimpleCache\SimpleCacheBridge;

$redis = new Redis();
$redis->connect('127.0.0.1', 6379); // Adjust host and port as needed

// Create a PSR-6 Redis Cache Pool
$cachePool = new RedisCachePool($redis);

// Wrap the PSR-6 Cache Pool with a PSR-16 Simple Cache
$simpleCache = new SimpleCacheBridge($cachePool);

$fileKey = 'my-file-key';

// Init FigmaClient with custom cache and default log driver by using API key.
$fc = FigmaClient::factory(cache: $simpleCache)->getWithApiKey('key');

$endpoint = new VersionHistoryEndpoint($fc);

$allHistory = $endpoint->fetchAll($fileKey);

$versions = $allHistory->versions;
