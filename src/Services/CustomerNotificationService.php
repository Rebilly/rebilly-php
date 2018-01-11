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
use Rebilly\Entities\EmailNotifications\CustomerNotification;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class CustomerNotificationService
 *
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 * @version 0.1
 */
final class CustomerNotificationService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return CustomerNotification[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'customer-notifications', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return CustomerNotification[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('customer-notifications', $params);
    }

    /**
     * @param string $eventType
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The customer does not exist
     *
     * @return CustomerNotification
     */
    public function load($eventType, $params = [])
    {
        return $this->client()->get('customer-notifications/{eventType}', ['eventType' => $eventType] + (array) $params);
    }

    /**
     * @param string $eventType
     * @param array|JsonSerializable|CustomerNotification $data
     *
     * @throws UnprocessableEntityException The input data is not valid
     *
     * @return CustomerNotification
     */
    public function update($eventType, $data)
    {
        return $this->client()->put($data, 'customer-notifications/{eventType}', ['eventType' => $eventType]);
    }
}
