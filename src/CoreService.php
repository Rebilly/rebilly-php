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

    private Api\AllowlistsApi $allowlists;

    private Api\AmlChecksApi $amlChecks;

    private Api\AmlSettingsApi $amlSettings;

    private Api\BlocklistsApi $blocklists;

    private Api\CashierCustomPropertySetsApi $cashierCustomPropertySets;

    private Api\CashierRequestsApi $cashierRequests;

    private Api\CashierStrategiesApi $cashierStrategies;

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

    private Api\JournalAccountsApi $journalAccounts;

    private Api\JournalEntriesApi $journalEntries;

    private Api\KycDocumentsApi $kycDocuments;

    private Api\KycRequestsApi $kycRequests;

    private Api\KycSettingsApi $kycSettings;

    private Api\PaymentCardsBankNamesApi $paymentCardsBankNames;

    private Api\PaymentInstrumentsApi $paymentInstruments;

    private Api\PaymentTokensApi $paymentTokens;

    private Api\PayoutRequestsApi $payoutRequests;

    private Api\PayoutsApi $payouts;

    private Api\PlansApi $plans;

    private Api\PreviewsApi $previews;

    private Api\ProductsApi $products;

    private Api\PurchaseApi $purchase;

    private Api\QuotesApi $quotes;

    private Api\RiskScoreRulesApi $riskScoreRules;

    private Api\SearchApi $search;

    private Api\ShippingRatesApi $shippingRates;

    private Api\SubscriptionCancellationsApi $subscriptionCancellations;

    private Api\SubscriptionPausesApi $subscriptionPauses;

    private Api\SubscriptionReactivationsApi $subscriptionReactivations;

    private Api\SubscriptionsApi $subscriptions;

    private Api\TagsApi $tags;

    private Api\TagsRulesApi $tagsRules;

    private Api\TransactionsApi $transactions;

    private Api\UsagesApi $usages;

    public function __construct(Client $client = null, array $config = [])
    {
        $this->client = $client ?? new Client($config);
        $this->allowlists = new Api\AllowlistsApi($this->client);
        $this->amlChecks = new Api\AmlChecksApi($this->client);
        $this->amlSettings = new Api\AmlSettingsApi($this->client);
        $this->blocklists = new Api\BlocklistsApi($this->client);
        $this->cashierCustomPropertySets = new Api\CashierCustomPropertySetsApi($this->client);
        $this->cashierRequests = new Api\CashierRequestsApi($this->client);
        $this->cashierStrategies = new Api\CashierStrategiesApi($this->client);
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
        $this->journalAccounts = new Api\JournalAccountsApi($this->client);
        $this->journalEntries = new Api\JournalEntriesApi($this->client);
        $this->kycDocuments = new Api\KycDocumentsApi($this->client);
        $this->kycRequests = new Api\KycRequestsApi($this->client);
        $this->kycSettings = new Api\KycSettingsApi($this->client);
        $this->paymentCardsBankNames = new Api\PaymentCardsBankNamesApi($this->client);
        $this->paymentInstruments = new Api\PaymentInstrumentsApi($this->client);
        $this->paymentTokens = new Api\PaymentTokensApi($this->client);
        $this->payoutRequests = new Api\PayoutRequestsApi($this->client);
        $this->payouts = new Api\PayoutsApi($this->client);
        $this->plans = new Api\PlansApi($this->client);
        $this->previews = new Api\PreviewsApi($this->client);
        $this->products = new Api\ProductsApi($this->client);
        $this->purchase = new Api\PurchaseApi($this->client);
        $this->quotes = new Api\QuotesApi($this->client);
        $this->riskScoreRules = new Api\RiskScoreRulesApi($this->client);
        $this->search = new Api\SearchApi($this->client);
        $this->shippingRates = new Api\ShippingRatesApi($this->client);
        $this->subscriptionCancellations = new Api\SubscriptionCancellationsApi($this->client);
        $this->subscriptionPauses = new Api\SubscriptionPausesApi($this->client);
        $this->subscriptionReactivations = new Api\SubscriptionReactivationsApi($this->client);
        $this->subscriptions = new Api\SubscriptionsApi($this->client);
        $this->tags = new Api\TagsApi($this->client);
        $this->tagsRules = new Api\TagsRulesApi($this->client);
        $this->transactions = new Api\TransactionsApi($this->client);
        $this->usages = new Api\UsagesApi($this->client);
    }

    public function allowlists(): Api\AllowlistsApi
    {
        return $this->allowlists;
    }

    public function amlChecks(): Api\AmlChecksApi
    {
        return $this->amlChecks;
    }

    public function amlSettings(): Api\AmlSettingsApi
    {
        return $this->amlSettings;
    }

    public function blocklists(): Api\BlocklistsApi
    {
        return $this->blocklists;
    }

    public function cashierCustomPropertySets(): Api\CashierCustomPropertySetsApi
    {
        return $this->cashierCustomPropertySets;
    }

    public function cashierRequests(): Api\CashierRequestsApi
    {
        return $this->cashierRequests;
    }

    public function cashierStrategies(): Api\CashierStrategiesApi
    {
        return $this->cashierStrategies;
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

    public function journalAccounts(): Api\JournalAccountsApi
    {
        return $this->journalAccounts;
    }

    public function journalEntries(): Api\JournalEntriesApi
    {
        return $this->journalEntries;
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

    public function paymentCardsBankNames(): Api\PaymentCardsBankNamesApi
    {
        return $this->paymentCardsBankNames;
    }

    public function paymentInstruments(): Api\PaymentInstrumentsApi
    {
        return $this->paymentInstruments;
    }

    public function paymentTokens(): Api\PaymentTokensApi
    {
        return $this->paymentTokens;
    }

    public function payoutRequests(): Api\PayoutRequestsApi
    {
        return $this->payoutRequests;
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

    public function quotes(): Api\QuotesApi
    {
        return $this->quotes;
    }

    public function riskScoreRules(): Api\RiskScoreRulesApi
    {
        return $this->riskScoreRules;
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

    public function tagsRules(): Api\TagsRulesApi
    {
        return $this->tagsRules;
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
