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
use Rebilly\Entities\EmailNotifications\EmailNotification;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class EmailNotificationService
 *
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 * @version 0.1
 */
final class EmailNotificationService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return EmailNotification[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'email-notifications', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return EmailNotification[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('email-notifications', $params);
    }

    /**
     * @param string $notificationId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The customer does not exist
     *
     * @return EmailNotification
     */
    public function load($notificationId, $params = [])
    {
        return $this->client()->get('email-notifications/{notificationId}', ['notificationId' => $notificationId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|EmailNotification $data
     * @param string $notificationId
     *
     * @throws UnprocessableEntityException The input data is not valid
     *
     * @return EmailNotification
     */
    public function create($data, $notificationId = null)
    {
        if (isset($notificationId)) {
            return $this->client()->put($data, 'email-notifications/{notificationId}', ['notificationId' => $notificationId]);
        } else {
            return $this->client()->post($data, 'email-notifications');
        }
    }

    /**
     * @param string $notificationId
     * @param array|JsonSerializable|EmailNotification $data
     *
     * @throws UnprocessableEntityException The input data is not valid
     *
     * @return EmailNotification
     */
    public function update($notificationId, $data)
    {
        return $this->client()->put($data, 'email-notifications/{notificationId}', ['notificationId' => $notificationId]);
    }

    /**
     * @param array $data
     *
     * @return EmailNotification
     */
    public function preview($data)
    {
        return $this->client()->post($data, 'previews/email-notifications/send-notification');
    }
}
