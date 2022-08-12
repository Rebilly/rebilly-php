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

final class DataValidationException extends HttpException
{
    private array $validationErrors = [];

    public function __construct(array $content = [], $message = '', $code = 0, Exception $previous = null)
    {
        if (isset($content['invalidFields']) && is_array($content['invalidFields'])) {
            $this->validationErrors = $content['invalidFields'];
        }

        parent::__construct(422, $message ?: 'Data Validation Failed.', $code, $previous);
    }

    public function getValidationErrors(): array
    {
        return $this->validationErrors;
    }
}
