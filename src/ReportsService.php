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

declare(strict_types=1);

namespace Rebilly\Sdk;

use Rebilly\Sdk\Api as Api;

class ReportsService
{
    private Client $client;

    private Api\CustomersApi $customers;

    private Api\DataExportsApi $dataExports;

    private Api\HistogramsApi $histograms;

    private Api\PreviewsApi $previews;

    private Api\ReportsApi $reports;

    private Api\SubscriptionCancellationsApi $subscriptionCancellations;

    private Api\SubscriptionPausesApi $subscriptionPauses;

    private Api\SubscriptionReactivationsApi $subscriptionReactivations;

    private Api\SubscriptionsApi $subscriptions;

    public function __construct(Client $client = null, array $config = [])
    {
        $this->client = $client ?? new Client($config);
        $this->customers = new Api\CustomersApi($this->client);
        $this->dataExports = new Api\DataExportsApi($this->client);
        $this->histograms = new Api\HistogramsApi($this->client);
        $this->previews = new Api\PreviewsApi($this->client);
        $this->reports = new Api\ReportsApi($this->client);
        $this->subscriptionCancellations = new Api\SubscriptionCancellationsApi($this->client);
        $this->subscriptionPauses = new Api\SubscriptionPausesApi($this->client);
        $this->subscriptionReactivations = new Api\SubscriptionReactivationsApi($this->client);
        $this->subscriptions = new Api\SubscriptionsApi($this->client);
    }

    public function customers(): Api\CustomersApi
    {
        return $this->customers;
    }

    public function dataExports(): Api\DataExportsApi
    {
        return $this->dataExports;
    }

    public function histograms(): Api\HistogramsApi
    {
        return $this->histograms;
    }

    public function previews(): Api\PreviewsApi
    {
        return $this->previews;
    }

    public function reports(): Api\ReportsApi
    {
        return $this->reports;
    }

    public function subscriptionCancellations(): Api\SubscriptionCancellationsApi
    {
        return $this->subscriptionCancellations;
    }

    public function subscriptionPauses(): Api\SubscriptionPausesApi
    {
        return $this->subscriptionPauses;
    }

    public function subscriptionReactivations(): Api\SubscriptionReactivationsApi
    {
        return $this->subscriptionReactivations;
    }

    public function subscriptions(): Api\SubscriptionsApi
    {
        return $this->subscriptions;
    }
}
