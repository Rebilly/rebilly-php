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

namespace Rebilly\Sdk\Exception;

use Exception;

final class TooManyRequestsException extends ClientException
{
    private string $retryAfter;

    private int $rateLimit;

    public function __construct($retryAfter, $rateLimit = 0, $message = '', $code = 0, Exception $previous = null)
    {
        $this->retryAfter = $retryAfter;
        $this->rateLimit = (int) $rateLimit;

        parent::__construct(429, $message, $code, $previous);
    }

    public function getRetryAfter(): string
    {
        return $this->retryAfter;
    }

    public function getRateLimit(): int
    {
        return $this->rateLimit;
    }
}
