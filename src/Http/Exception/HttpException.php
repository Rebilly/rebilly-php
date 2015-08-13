<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Http\Exception;

use Exception;

/**
 * Class HttpException.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
class HttpException extends Exception
{
    private $statusCode;

    public function __construct($status, $message = "", $code = 0, Exception $previous = null)
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
