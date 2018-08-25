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
use Rebilly\Entities\PaymentCard;
use Rebilly\Entities\PaymentCardMigrationsRequest;
use Rebilly\Entities\PaymentCardMigrationsResponse;
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
     * @return PaymentCard[]|Collection[]|Paginator
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
     * @param array|JsonSerializable|PaymentCardMigrationsRequest $data
     *
     * @return PaymentCardMigrationsResponse
     */
    public function migrate($data)
    {
        return $this->client()->post($data, 'payment-cards-migrations/migrate');
    }
}
