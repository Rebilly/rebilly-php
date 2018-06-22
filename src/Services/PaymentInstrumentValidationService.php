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

namespace Rebilly\Services;

use ArrayObject;
use JsonSerializable;
use Rebilly\Entities\PaymentInstrumentValidation;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

final class PaymentInstrumentValidationService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return PaymentInstrumentValidation[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'payment-instrument-validation', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return PaymentInstrumentValidation[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('payment-instrument-validation', $params);
    }

    /**
     * @param string $paymentInstrumentValidationId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does exist
     *
     * @return PaymentInstrumentValidation
     */
    public function load($paymentInstrumentValidationId, $params = [])
    {
        return $this->client()->get('payment-instrument-validation/{paymentInstrumentValidationId}', ['paymentInstrumentValidationId' => $paymentInstrumentValidationId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|PaymentInstrumentValidation $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return PaymentInstrumentValidation
     */
    public function create($data)
    {
        return $this->client()->post($data, 'payment-instrument-validation');
    }
}
