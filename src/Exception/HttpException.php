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

class HttpException extends Exception
{
    private int $statusCode;

    public function __construct($status, $message = '', $code = 0, Exception $previous = null)
    {
        $this->statusCode = (int) $status;
        parent::__construct($message, $code, $previous);
    }

    final public function getStatusCode(): int
    {
        return $this->statusCode;
    }
}
