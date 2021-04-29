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
 * @deprecated this exception is not in use anymore, and should not be relied upon
 * @see DataValidationException
 */
class UnprocessableEntityException extends ClientException
{
    private $errors;

    public function __construct(array $errors = [], $message = '', $code = 0, Exception $previous = null)
    {
        parent::__construct(422, $message, $code, $previous);
        $this->errors = $errors;
    }

    /**
     * @deprecated this method should be avoided in favor of {@see DataValidationException::getValidationErrors()}
     *
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
