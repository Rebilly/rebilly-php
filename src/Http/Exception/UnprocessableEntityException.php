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
 * Class UnprocessableEntityException.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class UnprocessableEntityException extends ClientException
{
    private $errors = [];

    public function __construct(array $errors = [], $message = "", $code = 0, Exception $previous = null)
    {
        $this->errors = $errors;
        parent::__construct(422, $message, $code, $previous);
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
