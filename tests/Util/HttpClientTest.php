<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Test\Util;

use GuzzleHttp\Psr7\Response;
use Turker\FigmaAPI\Exception\FigmaAPIException;
use Turker\FigmaAPI\Test\AbstractBaseTestCase;

final class HttpClientTest extends AbstractBaseTestCase
{
    public function testBaseUrlException()
    {
        $this->httpClient->setBaseUrl('');
        $this->expectException(FigmaAPIException::class);
        $this->expectExceptionMessage('Base URL must be set');
        $this->httpClient->get('test');
    }

    public function testApiKeyException()
    {
        $this->httpClient->setApiKey('');
        $this->httpClient->setBearerToken('');
        $this->expectException(FigmaAPIException::class);
        $this->expectExceptionMessage('API key or Bearer token must be set');
        $this->httpClient->get('test');
    }

    public function testEmptyBodyException()
    {
        $this->expectException(FigmaAPIException::class);
        $this->expectExceptionMessage('Body required for POST and PUT requests');
        $this->httpClient->post('test', []);
    }

    public function testServerException()
    {
        $this->mock->reset();
        $this->mock->append(new Response(500));

        $this->expectException(FigmaAPIException::class);
        $this->expectExceptionMessage('An internal server error occurred. Please try again later.');
        $this->httpClient->get('test');
    }

    public function testPutRequest()
    {
        $this->successResponse('{"success":true}');
        $response = $this->httpClient->put('/', '{"data":"test"}');
        $this->assertTrue($response['success']);
    }

    public function testPostRequest()
    {
        $this->successResponse('{"success":true}');
        $response = $this->httpClient->post('/', '{"data":"test"}');
        $this->assertTrue($response['success']);
    }

    public function testDeleteRequest()
    {
        $this->successResponse('{"success":true}');
        $response = $this->httpClient->delete('/');
        $this->assertTrue($response['success']);
    }

    public function testGetRequest()
    {
        $this->successResponse('{"success":true}');
        $response = $this->httpClient->get('/');
        $this->assertTrue($response['success']);
    }

    public function testGetRequestWithJsonResponse()
    {
        $this->successResponse('{"success":true}');
        $response = $this->httpClient->get('/');
        $this->assertTrue($response['success']);
    }

    public function testSetApiKey()
    {
        $this->httpClient->setApiKey('key');
        $this->assertEquals('key', $this->httpClient->getApiKey());
    }

    public function testSetBaseUrl()
    {
        $this->httpClient->setBaseUrl('url/');
        $this->assertEquals('url', $this->httpClient->getBaseUrl());
    }

    public function testSetBearerToken()
    {
        $this->httpClient->setBearerToken('token');
        $this->assertEquals('token', $this->httpClient->getBearerToken());
    }

    public function testSetHeader()
    {
        $this->httpClient->setHeader(['a' => 'b']);
        $this->assertEquals(['a' => 'b'], $this->httpClient->getHeader());
    }

    public function testAddHeader()
    {
        $this->httpClient->setHeader(['a' => 'b']);
        $this->httpClient->addHeader(['d' => 'f']);
        $this->assertEquals(['a' => 'b', 'd' => 'f'], $this->httpClient->getHeader());
    }

    public function testReturnSelfMethods()
    {
        $obj = $this->httpClient->setApiKey('key');
        $this->assertSame($this->httpClient, $obj);

        $obj = $this->httpClient->setBaseUrl('key');
        $this->assertSame($this->httpClient, $obj);

        $obj = $this->httpClient->setBearerToken('key');
        $this->assertSame($this->httpClient, $obj);

        $obj = $this->httpClient->setHeader([]);
        $this->assertSame($this->httpClient, $obj);

        $obj = $this->httpClient->addHeader([]);
        $this->assertSame($this->httpClient, $obj);
    }
}
