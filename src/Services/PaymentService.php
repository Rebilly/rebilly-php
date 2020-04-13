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
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class PaymentService
 *
 */
final class PaymentService extends Service
{
    /**
     * @deprecated In favor of TransactionService
     *
     * @param array|ArrayObject $params
     *
     * @return Entities\Payment[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'payments', $params);
    }

    /**
     * @deprecated In favor of TransactionService
     *
     * @param array|ArrayObject $params
     *
     * @return Entities\Payment[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('payments', $params);
    }

    /**
     * @deprecated In favor of TransactionService
     *
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The payment does not exist
     *
     * @return Entities\Payment
     */
    public function load($paymentId, $params = [])
    {
        return $this->client()->get('payments/{paymentId}', ['paymentId' => $paymentId] + (array) $params);
    }

    /**
     * @deprecated In favor of TransactionService
     *
     * @param array|JsonSerializable|Entities\Payment $payment
     * @param string|null $paymentId
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return Entities\Payment
     */
    public function create($payment, $paymentId = null)
    {
        if (isset($paymentId)) {
            return $this->client()->put($payment, 'payments/{paymentId}', ['paymentId' => $paymentId]);
        }

        return $this->client()->post($payment, 'payments');
    }
}
