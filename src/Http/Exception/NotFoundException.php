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
 * Class NotFoundException.
 *
 */
final class NotFoundException extends ClientException
{
    public function __construct($message = '', $code = 0, Exception $previous = null)
    {
        parent::__construct(404, $message, $code, $previous);
    }
}
