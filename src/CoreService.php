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

class CoreService
{
    private Client $client;

    private Api\AmlApi $aml;

    private Api\AmlChecksApi $amlChecks;

    private Api\BlocklistsApi $blocklists;

    private Api\CouponsApi $coupons;

    private Api\CreditMemosApi $creditMemos;

    private Api\CustomFieldsApi $customFields;

    private Api\CustomerAuthenticationApi $customerAuthentication;

    private Api\CustomersApi $customers;

    private Api\DigitalWalletsApi $digitalWallets;

    private Api\DisputesApi $disputes;

    private Api\FeesApi $fees;

    private Api\FilesApi $files;

    private Api\InvoicesApi $invoices;

    private Api\KycDocumentsApi $kycDocuments;

    private Api\KycRequestsApi $kycRequests;

    private Api\KycSettingsApi $kycSettings;

    private Api\PaymentInstrumentsApi $paymentInstruments;

    private Api\PaymentTokensApi $paymentTokens;

    private Api\PayoutsApi $payouts;

    private Api\PlansApi $plans;

    private Api\PreviewsApi $previews;

    private Api\ProductsApi $products;

    private Api\PurchaseApi $purchase;

    private Api\SearchApi $search;

    private Api\ShippingRatesApi $shippingRates;

    private Api\SubscriptionCancellationsApi $subscriptionCancellations;

    private Api\SubscriptionPausesApi $subscriptionPauses;

    private Api\SubscriptionReactivationsApi $subscriptionReactivations;

    private Api\SubscriptionsApi $subscriptions;

    private Api\TagsApi $tags;

    private Api\TransactionsApi $transactions;

    private Api\UsagesApi $usages;

    public function __construct(Client $client = null, array $config = [])
    {
        $this->client = $client ?? new Client($config);
        $this->aml = new Api\AmlApi($this->client);
        $this->amlChecks = new Api\AmlChecksApi($this->client);
        $this->blocklists = new Api\BlocklistsApi($this->client);
        $this->coupons = new Api\CouponsApi($this->client);
        $this->creditMemos = new Api\CreditMemosApi($this->client);
        $this->customFields = new Api\CustomFieldsApi($this->client);
        $this->customerAuthentication = new Api\CustomerAuthenticationApi($this->client);
        $this->customers = new Api\CustomersApi($this->client);
        $this->digitalWallets = new Api\DigitalWalletsApi($this->client);
        $this->disputes = new Api\DisputesApi($this->client);
        $this->fees = new Api\FeesApi($this->client);
        $this->files = new Api\FilesApi($this->client);
        $this->invoices = new Api\InvoicesApi($this->client);
        $this->kycDocuments = new Api\KycDocumentsApi($this->client);
        $this->kycRequests = new Api\KycRequestsApi($this->client);
        $this->kycSettings = new Api\KycSettingsApi($this->client);
        $this->paymentInstruments = new Api\PaymentInstrumentsApi($this->client);
        $this->paymentTokens = new Api\PaymentTokensApi($this->client);
        $this->payouts = new Api\PayoutsApi($this->client);
        $this->plans = new Api\PlansApi($this->client);
        $this->previews = new Api\PreviewsApi($this->client);
        $this->products = new Api\ProductsApi($this->client);
        $this->purchase = new Api\PurchaseApi($this->client);
        $this->search = new Api\SearchApi($this->client);
        $this->shippingRates = new Api\ShippingRatesApi($this->client);
        $this->subscriptionCancellations = new Api\SubscriptionCancellationsApi($this->client);
        $this->subscriptionPauses = new Api\SubscriptionPausesApi($this->client);
        $this->subscriptionReactivations = new Api\SubscriptionReactivationsApi($this->client);
        $this->subscriptions = new Api\SubscriptionsApi($this->client);
        $this->tags = new Api\TagsApi($this->client);
        $this->transactions = new Api\TransactionsApi($this->client);
        $this->usages = new Api\UsagesApi($this->client);
    }

    public function aml(): Api\AmlApi
    {
        return $this->aml;
    }

    public function amlChecks(): Api\AmlChecksApi
    {
        return $this->amlChecks;
    }

    public function blocklists(): Api\BlocklistsApi
    {
        return $this->blocklists;
    }

    public function coupons(): Api\CouponsApi
    {
        return $this->coupons;
    }

    public function creditMemos(): Api\CreditMemosApi
    {
        return $this->creditMemos;
    }

    public function customFields(): Api\CustomFieldsApi
    {
        return $this->customFields;
    }

    public function customerAuthentication(): Api\CustomerAuthenticationApi
    {
        return $this->customerAuthentication;
    }

    public function customers(): Api\CustomersApi
    {
        return $this->customers;
    }

    public function digitalWallets(): Api\DigitalWalletsApi
    {
        return $this->digitalWallets;
    }

    public function disputes(): Api\DisputesApi
    {
        return $this->disputes;
    }

    public function fees(): Api\FeesApi
    {
        return $this->fees;
    }

    public function files(): Api\FilesApi
    {
        return $this->files;
    }

    public function invoices(): Api\InvoicesApi
    {
        return $this->invoices;
    }

    public function kycDocuments(): Api\KycDocumentsApi
    {
        return $this->kycDocuments;
    }

    public function kycRequests(): Api\KycRequestsApi
    {
        return $this->kycRequests;
    }

    public function kycSettings(): Api\KycSettingsApi
    {
        return $this->kycSettings;
    }

    public function paymentInstruments(): Api\PaymentInstrumentsApi
    {
        return $this->paymentInstruments;
    }

    public function paymentTokens(): Api\PaymentTokensApi
    {
        return $this->paymentTokens;
    }

    public function payouts(): Api\PayoutsApi
    {
        return $this->payouts;
    }

    public function plans(): Api\PlansApi
    {
        return $this->plans;
    }

    public function previews(): Api\PreviewsApi
    {
        return $this->previews;
    }

    public function products(): Api\ProductsApi
    {
        return $this->products;
    }

    public function purchase(): Api\PurchaseApi
    {
        return $this->purchase;
    }

    public function search(): Api\SearchApi
    {
        return $this->search;
    }

    public function shippingRates(): Api\ShippingRatesApi
    {
        return $this->shippingRates;
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

    public function tags(): Api\TagsApi
    {
        return $this->tags;
    }

    public function transactions(): Api\TransactionsApi
    {
        return $this->transactions;
    }

    public function usages(): Api\UsagesApi
    {
        return $this->usages;
    }
}
