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
use Rebilly\Entities\CommonPaymentInstrument;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class PayPalAccountService.
 */
class PayPalAccountService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return CommonPaymentInstrument[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'paypal-accounts', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return CommonPaymentInstrument[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('paypal-accounts', $params);
    }

    /**
     * @param string $paypalAccountId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does not exist
     *
     * @return CommonPaymentInstrument
     */
    public function load($paypalAccountId, $params = [])
    {
        return $this->client()->get('paypal-accounts/{paypalAccountId}', ['paypalAccountId' => $paypalAccountId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|CommonPaymentInstrument $data
     * @param string $paypalAccountId
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return CommonPaymentInstrument
     */
    public function create($data, $paypalAccountId = null)
    {
        if (isset($paypalAccountId)) {
            return $this->client()->put($data, 'paypal-accounts/{paypalAccountId}', ['paypalAccountId' => $paypalAccountId]);
        }

        return $this->client()->post($data, 'paypal-accounts');
    }

    /**
     * @param string $paypalAccountId
     *
     * @return CommonPaymentInstrument
     */
    public function deactivate($paypalAccountId)
    {
        return $this->client()->post([], 'paypal-accounts/{paypalAccountId}/deactivation', ['paypalAccountId' => $paypalAccountId]);
    }
}
