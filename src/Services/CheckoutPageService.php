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
use Rebilly\Entities\CheckoutPage;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class CheckoutPageService
 *
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 * @version 0.1
 */
final class CheckoutPageService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return CheckoutPage[]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'checkout-pages', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return CheckoutPage[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('checkout-pages', $params);
    }

    /**
     * @param string $checkoutPageId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does exist
     *
     * @return CheckoutPage
     */
    public function load($checkoutPageId, $params = [])
    {
        return $this->client()->get('checkout-pages/{checkoutPageId}', ['checkoutPageId' => $checkoutPageId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|CheckoutPage $data
     * @param string $checkoutPageId
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return CheckoutPage
     */
    public function create($data, $checkoutPageId = null)
    {
        if (isset($checkoutPageId)) {
            return $this->client()->put($data, 'checkout-pages/{checkoutPageId}', ['checkoutPageId' => $checkoutPageId]);
        } else {
            return $this->client()->post($data, 'checkout-pages');
        }
    }

    /**
     * @param string $checkoutPageId
     * @param array|JsonSerializable|CheckoutPage $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return CheckoutPage
     */
    public function update($checkoutPageId, $data)
    {
        return $this->client()->put($data, 'checkout-pages/{checkoutPageId}', ['checkoutPageId' => $checkoutPageId]);
    }

    /**
     * @param string $checkoutPageId
     */
    public function delete($checkoutPageId)
    {
        $this->client()->delete('checkout-pages/{checkoutPageId}', ['checkoutPageId' => $checkoutPageId]);
    }
}
