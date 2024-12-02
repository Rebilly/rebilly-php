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

final class GoneException extends ClientException
{
    public function __construct($message = '', $code = 0, Exception $previous = null)
    {
        parent::__construct(410, $message, $code, $previous);
    }
}
