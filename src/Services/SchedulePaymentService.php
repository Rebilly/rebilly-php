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
use Rebilly\Entities;
use Rebilly\Http\Exception\GoneException;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class SchedulePaymentService
 *
 */
final class SchedulePaymentService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return Entities\ScheduledPayment[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'queue/payments', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return Entities\ScheduledPayment[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('queue/payments', $params);
    }

    /**
     * @param string $paymentId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The scheduled payment does not exist
     * @throws GoneException The process is completed but the payment can not be created
     *
     * @return Entities\ScheduledPayment|Entities\Payment
     */
    public function load($paymentId, $params = [])
    {
        return $this->client()->get('queue/payments/{paymentId}', ['paymentId' => $paymentId] + (array) $params);
    }

    /**
     * @param string $paymentId
     *
     * @throws NotFoundException The payment does not exist
     * @throws UnprocessableEntityException The payment was not cancelled
     *
     * @return Entities\ScheduledPayment|Entities\Payment
     */
    public function cancel($paymentId)
    {
        return $this->client()->post([], 'queue/payments/{paymentId}/cancel', ['paymentId' => $paymentId]);
    }

    /**
     * @param string $paymentId
     * @param array|JsonSerializable|Entities\Payment $params
     *
     * @throws NotFoundException The payment does not exist
     * @throws NotFoundException The scheduled payment does not exist
     * @throws GoneException The process is completed but the payment can not be created
     *
     * @return Entities\ScheduledPayment|Entities\Payment
     */
    public function update($paymentId, $params)
    {
        return $this->client()->put($params, 'queue/payments/{paymentId}', ['paymentId' => $paymentId]);
    }
}
