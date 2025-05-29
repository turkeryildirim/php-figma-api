<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Psr\SimpleCache\CacheInterface;
use Turker\FigmaAPI\Util\HttpClient;

abstract class AbstractBaseTestCase extends TestCase
{
    protected HttpClient $httpClient;
    protected MockHandler $mock;
    protected function setUp(): void
    {
        parent::setUp();
        $log   = $this->getMockBuilder(LoggerInterface::class);
        $cache = $this->getMockBuilder(CacheInterface::class);

        $mock = new MockHandler([
            new RequestException('Error', new Request('GET', 'test'))
        ]);

        $this->mock       = $mock;
        $this->httpClient = new HttpClient($log->getMock(), $cache->getMock());
        $this->httpClient->setApiKey('test');
        $this->httpClient->__injectTestHandler($this->mock);
    }

    protected function successResponse(string $body): void
    {
        $this->mock->reset();
        $this->mock->append(
            new Response(
                200,
                ['Content-Type' => 'application/json'],
                $body
            )
        );
    }
    protected function errorResponse(int $status = 500): void
    {
        $this->mock->reset();
        $this->mock->append(
            new Response(
                $status,
                ['Content-Type' => 'application/json'],
                ['err' => 'Error', 'status' => $status]
            )
        );
    }
}
