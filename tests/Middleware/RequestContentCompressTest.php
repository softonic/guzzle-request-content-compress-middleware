<?php

namespace Softonic\RequestContentCompress\Tests\Middleware;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Softonic\RequestContentCompress\Middleware\RequestContentCompress;

class RequestContentCompressTest extends TestCase
{
    const CONTENT = '{"abc": "def"}';

    public function testInvoke()
    {
        $requestContentCompress = new RequestContentCompress();
        $handler                = new MockHandler([new Response(200)]);
        $handlerWithMiddleware  = $requestContentCompress($handler);
        $client                 = new Client(['handler' => $handlerWithMiddleware]);
        $mockRequest            = new Request('POST', 'http://test.com', [], self::CONTENT);
        $client->send($mockRequest, []);
        $request        = $handler->getLastRequest();
        $gzippedContent = gzencode(self::CONTENT);
        $this->assertSame($gzippedContent, (string)$request->getBody());
        $this->assertSame('gzip', $request->getHeaderLine('Content-Encoding'));
        $this->assertEquals(strlen($gzippedContent), $request->getHeaderLine('Content-Length'));
    }
}
