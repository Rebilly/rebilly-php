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
use Rebilly\Entities\PaymentCard;
use Rebilly\Entities\PaymentCardMigrationsRequest;
use Rebilly\Entities\PaymentCardMigrationsResponse;
use Rebilly\Entities\User;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class PaymentCardMigrationsService
 */
final class PaymentCardMigrationsService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return User[]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'payment-cards-migrations', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return PaymentCard[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('payment-cards-migrations', $params);
    }

    /**
     * @param string $userId
     * @param array|JsonSerializable|PaymentCardMigrationsRequest $data
     *
     * @return PaymentCardMigrationsResponse
     */
    public function migrate($data)
    {
        return $this->client()->post($data, 'payment-cards-migrations/migrate');
    }
}
