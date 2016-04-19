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
 * @author Dara Pich <dara.pich@rebilly.com>
 * @version 0.1
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
     * @throws NotFoundException The resource data does exist
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
        } else {
            return $this->client()->post($data, 'paypal-accounts');
        }
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
