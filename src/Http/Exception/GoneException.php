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
 * Class GoneException.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class GoneException extends ClientException
{
    public function __construct($message = "", $code = 0, Exception $previous = null)
    {
        parent::__construct(410, $message, $code, $previous);
    }
}
