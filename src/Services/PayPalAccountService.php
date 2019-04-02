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
use Rebilly\Entities\PayPalAccount;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class PayPalAccountService
 *
 */

class PayPalAccountService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return PayPalAccount[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'paypal-accounts', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return PayPalAccount[]|Collection
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
     * @return PayPalAccount
     */
    public function load($paypalAccountId, $params = [])
    {
        return $this->client()->get('paypal-accounts/{paypalAccountId}', ['paypalAccountId' => $paypalAccountId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|PayPalAccount $data
     * @param string $paypalAccountId
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return PayPalAccount
     */
    public function create($data, $paypalAccountId = null)
    {
        if (isset($paypalAccountId)) {
            return $this->client()->put($data, 'paypal-accounts/{paypalAccountId}', ['paypalAccountId' => $paypalAccountId]);
        }

        return $this->client()->post($data, 'paypal-accounts');
    }

    /**
     * @param array|JsonSerializable|PayPalAccount $data
     * @param string $paypalAccountId
     *
     * @return PayPalAccount
     */
    public function activate($data, $paypalAccountId)
    {
        return $this->client()->post($data, 'paypal-accounts/{paypalAccountId}/activation', ['paypalAccountId' => $paypalAccountId]);
    }

    /**
     * @param string $paypalAccountId
     *
     * @return PayPalAccount
     */
    public function deactivate($paypalAccountId)
    {
        return $this->client()->post([], 'paypal-accounts/{paypalAccountId}/deactivation', ['paypalAccountId' => $paypalAccountId]);
    }
}
