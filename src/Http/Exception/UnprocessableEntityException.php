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
 * Class UnprocessableEntityException.
 *
 */
class UnprocessableEntityException extends ClientException
{
    private $errors = [];

    public function __construct(array $errors = [], $message = '', $code = 0, Exception $previous = null)
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
