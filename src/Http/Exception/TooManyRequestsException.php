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

namespace Rebilly\Http\Exception;

use Exception;

/**
 * Class TooManyRequestsException.
 *
 */
final class TooManyRequestsException extends ClientException
{
    private $retryAfter;

    private $rateLimit;

    public function __construct($retryAfter, $rateLimit = 0, $message = '', $code = 0, Exception $previous = null)
    {
        $this->retryAfter = $retryAfter;
        $this->rateLimit = (int) $rateLimit;

        parent::__construct(429, $message, $code, $previous);
    }

    /**
     * @return string
     */
    public function getRetryAfter()
    {
        return $this->retryAfter;
    }

    /**
     * @return int
     */
    public function getRateLimit()
    {
        return $this->rateLimit;
    }
}
