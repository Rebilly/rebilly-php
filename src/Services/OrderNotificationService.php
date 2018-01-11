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
use Rebilly\Entities\EmailNotifications\OrderNotification;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class OrderNotificationService
 *
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 * @version 0.1
 */
final class OrderNotificationService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return OrderNotification[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'order-notifications', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return OrderNotification[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('order-notifications', $params);
    }

    /**
     * @param string $eventType
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The customer does not exist
     *
     * @return OrderNotification
     */
    public function load($eventType, $params = [])
    {
        return $this->client()->get('order-notifications/{eventType}', ['eventType' => $eventType] + (array) $params);
    }

    /**
     * @param string $eventType
     * @param array|JsonSerializable|OrderNotification $data
     *
     * @throws UnprocessableEntityException The input data is not valid
     *
     * @return OrderNotification
     */
    public function update($eventType, $data)
    {
        return $this->client()->put($data, 'order-notifications/{eventType}', ['eventType' => $eventType]);
    }
}
