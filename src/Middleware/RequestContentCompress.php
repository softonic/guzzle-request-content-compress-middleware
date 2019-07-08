<?php

namespace Softonic\RequestContentCompress\Middleware;

use Closure;
use function GuzzleHttp\Psr7\modify_request;
use Psr\Http\Message\RequestInterface;

final class RequestContentCompress
{
    public function __invoke(callable $handler): Closure
    {
        return static function (RequestInterface $request, array $options) use ($handler) {
            $content = gzencode($request->getBody()->getContents());
            $request = modify_request($request, ['body' => $content, 'set_headers' => ['Content-Encoding' => 'gzip']]);

            return $handler($request, $options);
        };
    }
}
