<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Services;

use ArrayObject;
use Rebilly\Http\Exception\GoneException;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Resource\Collection;
use Rebilly\Resource\Service;
use Rebilly\Entities;

/**
 * Class PaymentService
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class PaymentService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return Entities\Payment[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('payments', $params);
    }

    /**
     * @param string $paymentId
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
     * @param array|Entities\Payment $payment
     * @param string|null $paymentId
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return Entities\Payment|Entities\ScheduledPayment
     */
    public function create($payment, $paymentId = null)
    {
        if (isset($paymentId)) {
            return $this->client()->put($payment, 'payments/{paymentId}', ['paymentId' => $paymentId]);
        } else {
            return $this->client()->post($payment, 'payments');
        }
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return Entities\ScheduledPayment[]|Collection
     */
    public function searchInQueue($params = [])
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
    public function loadFromQueue($paymentId, $params = [])
    {
        return $this->client()->get('queue/payments/{paymentId}', ['paymentId' => $paymentId] + (array) $params);
    }
}
