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
use Rebilly\Entities\Invoice;
use Rebilly\Entities\PreviewOrder;
use Rebilly\Entities\Subscription;
use Rebilly\Entities\SubscriptionChangeItems;
use Rebilly\Entities\SubscriptionInterimInvoice;
use Rebilly\Http\Exception\DataValidationException;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class SubscriptionService
 *
 */
final class SubscriptionService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return Subscription[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'subscriptions', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return Subscription[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('subscriptions', $params);
    }

    /**
     * @param string $subscriptionId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException if resource does not exist
     *
     * @return Subscription
     */
    public function load($subscriptionId, $params = [])
    {
        return $this->client()->get('subscriptions/{subscriptionId}', ['subscriptionId' => $subscriptionId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|Subscription $data
     * @param string $subscriptionId
     *
     * @throws DataValidationException if input data is not valid
     *
     * @return Subscription
     */
    public function create($data, $subscriptionId = null)
    {
        if (isset($subscriptionId)) {
            return $this->client()->put($data, 'subscriptions/{subscriptionId}', ['subscriptionId' => $subscriptionId]);
        }

        return $this->client()->post($data, 'subscriptions');
    }

    /**
     * @param string $subscriptionId
     * @param array|JsonSerializable|Subscription $data
     *
     * @throws DataValidationException if input data is not valid
     *
     * @return Subscription
     */
    public function update($subscriptionId, $data)
    {
        return $this->client()->put($data, 'subscriptions/{subscriptionId}', ['subscriptionId' => $subscriptionId]);
    }

    /**
     * @param string $subscriptionId
     */
    public function delete($subscriptionId)
    {
        $this->client()->delete('subscriptions/{subscriptionId}', ['subscriptionId' => $subscriptionId]);
    }

    /**
     * @param string $subscriptionId
     *
     * @return Subscription
     */
    public function void($subscriptionId)
    {
        return $this->client()->post([], 'subscriptions/{subscriptionId}/void', ['subscriptionId' => $subscriptionId]);
    }

    /**
     * @param string $subscriptionId
     * @param array|JsonSerializable|SubscriptionInterimInvoice $data
     *
     * @throws DataValidationException if input data is not valid
     *
     * @return Invoice
     */
    public function issueInterimInvoice($subscriptionId, $data)
    {
        return $this->client()->post(
            $data,
            'subscriptions/{subscriptionId}/interim-invoice',
            ['subscriptionId' => $subscriptionId]
        );
    }

    /**
     * @param string $subscriptionId
     *
     * @return Invoice
     */
    public function getUpcomingInvoice($subscriptionId)
    {
        return $this->client()->get(
            'subscriptions/{subscriptionId}/upcoming-invoice',
            ['subscriptionId' => $subscriptionId]
        );
    }

    /**
     * @param string $subscriptionId
     *
     * @return Invoice
     */
    public function issueEarlyUpcomingInvoice($subscriptionId)
    {
        return $this->client()->post(
            [],
            'subscriptions/{subscriptionId}/upcoming-invoice/issue',
            ['subscriptionId' => $subscriptionId]
        );
    }

    /**
     * @deprecated use {@see issueEarlyUpcomingInvoice()} instead
     *
     * @param string $subscriptionId
     * @param string $invoiceId
     *
     * @return Invoice
     */
    public function issueUpcomingInvoice($subscriptionId, $invoiceId)
    {
        return $this->client()->post(
            [],
            'subscriptions/{subscriptionId}/upcoming-invoices/{invoiceId}/issue',
            [
                'subscriptionId' => $subscriptionId,
                'invoiceId' => $invoiceId,
            ]
        );
    }

    /**
     * @param string $subscriptionId
     * @param array|JsonSerializable|SubscriptionChangeItems $data
     * @param array|ArrayObject $params
     *
     * @throws DataValidationException if input data is not valid
     *
     * @return Subscription
     */
    public function changeItems($subscriptionId, $data, $params = [])
    {
        return $this->client()->post(
            $data,
            'subscriptions/{subscriptionId}/change-items',
            ['subscriptionId' => $subscriptionId] + (array) $params
        );
    }

    /**
     * @param array|JsonSerializable|PreviewOrder $data
     *
     * @throws DataValidationException if input data is not valid
     *
     * @return PreviewOrder
     */
    public function previewOrder($data)
    {
        return $this->client()->post(
            $data,
            'previews/orders'
        );
    }
}
