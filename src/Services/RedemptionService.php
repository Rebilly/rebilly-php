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
use Rebilly\Entities\Coupons\Redemption;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class RedemptionService
 *
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 * @version 0.1
 */
final class RedemptionService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return Redemption[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'coupons-redemptions', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return Redemption[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('coupons-redemptions', $params);
    }

    /**
     * @param string $redemptionId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does exist
     *
     * @return Redemption
     */
    public function load($redemptionId, $params = [])
    {
        return $this->client()->get('coupons-redemptions/{redemptionId}', ['redemptionId' => $redemptionId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|Redemption $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return Redemption
     */
    public function redeem($data)
    {
        return $this->client()->post($data, 'coupons-redemptions');
    }

    /**
     * @param string $redemptionId
     *
     * @return Redemption
     */
    public function cancel($redemptionId)
    {
        return $this->client()->post(
            [],
            'coupons-redemptions/{redemptionId}/cancel',
            ['redemptionId' => $redemptionId]
        );
    }
}
