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
 * Class DataValidationException.
 */
final class DataValidationException extends UnprocessableEntityException
{
    private $validationErrors = [];

    public function __construct(array $content = [], $message = '', $code = 0, Exception $previous = null)
    {
        if (isset($content['invalidFields']) && is_array($content['invalidFields'])) {
            foreach ($content['invalidFields'] as $field => &$errors) {
                if (is_array($errors)) {
                    foreach ($errors as &$error) {
                        $error = $error['message'] ?? '';
                    }
                }
            }
            $this->validationErrors = $content['invalidFields'];
        }

        parent::__construct($content['details'] ?? [], $message ?: 'Data Validation Failed.', $code, $previous);
    }

    /**
     * @return array
     */
    public function getValidationErrors()
    {
        return $this->validationErrors;
    }
}
