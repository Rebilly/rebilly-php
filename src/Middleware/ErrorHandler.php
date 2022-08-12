<?php
/**
 * This source file is proprietary and part of Rebilly.
 *
 * (c) Rebilly SRL
 *     Rebilly Ltd.
 *     Rebilly Inc.
 *
 * @see https://www.rebilly.com
 */

declare(strict_types=1);

namespace Rebilly\Sdk\Middleware;

use Closure;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Rebilly\Sdk\Exception;

final class ErrorHandler
{
    public function __invoke(callable $next): Closure
    {
        return function (RequestInterface $request, array $options) use ($next) {
            return $next($request, $options)
                ->then(function (ResponseInterface $response) use ($request): ResponseInterface {
                    $code = $response->getStatusCode();
                    if ($code < 400) {
                        return $response;
                    }
                    if ($code === 404) {
                        throw new Exception\NotFoundException();
                    }

                    if ($code === 410) {
                        throw new Exception\GoneException();
                    }

                    if ($code === 422) {
                        $content = json_decode($response->getBody()->getContents(), true);

                        throw new Exception\DataValidationException($content ?? []);
                    }

                    if ($code === 429) {
                        throw new Exception\TooManyRequestsException(
                            $response->getHeaderLine('Retry-After'),
                            $response->getHeaderLine('Rate-Limit-Limit'),
                            'Too many requests, retry after ' . $response->getHeaderLine('Retry-After')
                        );
                    }

                    throw RequestException::create($request, $response);
                });
        };
    }
}
