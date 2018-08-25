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
 * Class HttpException.
 *
 */
class HttpException extends Exception
{
    private $statusCode;

    public function __construct($status, $message = '', $code = 0, Exception $previous = null)
    {
        $this->statusCode = (int) $status;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return mixed
     */
    final public function getStatusCode()
    {
        return $this->statusCode;
    }
}
