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

class Service
{
    private Client $client;

    private Api\AmlChecksApi $amlChecks;

    private Api\AmlSettingsApi $amlSettings;

    private Api\FilesApi $files;

    private Api\CustomerAuthenticationApi $customerAuthentication;

    private Api\BlocklistsApi $blocklists;

    private Api\CouponsApi $coupons;

    private Api\CustomFieldsApi $customFields;

    private Api\CustomersApi $customers;

    private Api\DisputesApi $disputes;

    private Api\ExternalIdentifiersApi $externalIdentifiers;

    private Api\ExternalServicesSettingsApi $externalServicesSettings;

    private Api\ApplicationInstancesApi $applicationInstances;

    private Api\ApplicationsApi $applications;

    private Api\InvoicesApi $invoices;

    private Api\CreditMemosApi $creditMemos;

    private Api\JournalAccountsApi $journalAccounts;

    private Api\JournalEntriesApi $journalEntries;

    private Api\KycRequestsApi $kycRequests;

    private Api\KycDocumentsApi $kycDocuments;

    private Api\KycSettingsApi $kycSettings;

    private Api\PaymentInstrumentsApi $paymentInstruments;

    private Api\PlansApi $plans;

    private Api\ProductsApi $products;

    private Api\QuotesApi $quotes;

    private Api\PurchaseApi $purchase;

    private Api\SearchApi $search;

    private Api\ShippingRatesApi $shippingRates;

    private Api\SubscriptionsApi $subscriptions;

    private Api\SubscriptionPausesApi $subscriptionPauses;

    private Api\SubscriptionCancellationsApi $subscriptionCancellations;

    private Api\SubscriptionReactivationsApi $subscriptionReactivations;

    private Api\UsagesApi $usages;

    private Api\TagsApi $tags;

    private Api\PaymentTokensApi $paymentTokens;

    private Api\DigitalWalletsApi $digitalWallets;

    private Api\TransactionsApi $transactions;

    private Api\PayoutsApi $payouts;

    private Api\FeesApi $fees;

    private Api\ApiKeysApi $apiKeys;

    private Api\BalanceTransactionsApi $balanceTransactions;

    private Api\BillingPortalsApi $billingPortals;

    private Api\BroadcastMessagesApi $broadcastMessages;

    private Api\DepositRequestsApi $depositRequests;

    private Api\DepositStrategiesApi $depositStrategies;

    private Api\DepositCustomPropertySetsApi $depositCustomPropertySets;

    private Api\CheckoutFormsApi $checkoutForms;

    private Api\ServiceCredentialsApi $serviceCredentials;

    private Api\CustomDomainsApi $customDomains;

    private Api\EmailDeliverySettingsApi $emailDeliverySettings;

    private Api\EmailMessagesApi $emailMessages;

    private Api\EmailNotificationsApi $emailNotifications;

    private Api\EventsApi $events;

    private Api\AccountApi $account;

    private Api\GatewayAccountsApi $gatewayAccounts;

    private Api\SegmentsApi $segments;

    private Api\IntegrationsApi $integrations;

    private Api\ListsApi $lists;

    private Api\MembershipsApi $memberships;

    private Api\OrganizationsApi $organizations;

    private Api\PaymentCardsBankNamesApi $paymentCardsBankNames;

    private Api\PaymentMethodsApi $paymentMethods;

    private Api\PayoutRequestsApi $payoutRequests;

    private Api\ProfileApi $profile;

    private Api\PreviewsApi $previews;

    private Api\RolesApi $roles;

    private Api\SendThroughAttributionApi $sendThroughAttribution;

    private Api\StatusApi $status;

    private Api\TrackingApi $tracking;

    private Api\UsersApi $users;

    private Api\WebhooksApi $webhooks;

    private Api\WebsitesApi $websites;

    private Api\DataExportsApi $dataExports;

    private Api\OrganizationExportsApi $organizationExports;

    private Api\HistogramsApi $histograms;

    private Api\ReportsApi $reports;

    private Api\RiskScoreRulesApi $riskScoreRules;

    private Api\RiskScoreSimulationJobsApi $riskScoreSimulationJobs;

    private Api\AllowlistsApi $allowlists;

    private Api\TagsRulesApi $tagsRules;

    public function __construct(Client $client = null, array $config = [])
    {
        $this->client = $client ?? new Client($config);
        $this->amlChecks = new Api\AmlChecksApi($this->client);
        $this->amlSettings = new Api\AmlSettingsApi($this->client);
        $this->files = new Api\FilesApi($this->client);
        $this->customerAuthentication = new Api\CustomerAuthenticationApi($this->client);
        $this->blocklists = new Api\BlocklistsApi($this->client);
        $this->coupons = new Api\CouponsApi($this->client);
        $this->customFields = new Api\CustomFieldsApi($this->client);
        $this->customers = new Api\CustomersApi($this->client);
        $this->disputes = new Api\DisputesApi($this->client);
        $this->externalIdentifiers = new Api\ExternalIdentifiersApi($this->client);
        $this->externalServicesSettings = new Api\ExternalServicesSettingsApi($this->client);
        $this->applicationInstances = new Api\ApplicationInstancesApi($this->client);
        $this->applications = new Api\ApplicationsApi($this->client);
        $this->invoices = new Api\InvoicesApi($this->client);
        $this->creditMemos = new Api\CreditMemosApi($this->client);
        $this->journalAccounts = new Api\JournalAccountsApi($this->client);
        $this->journalEntries = new Api\JournalEntriesApi($this->client);
        $this->kycRequests = new Api\KycRequestsApi($this->client);
        $this->kycDocuments = new Api\KycDocumentsApi($this->client);
        $this->kycSettings = new Api\KycSettingsApi($this->client);
        $this->paymentInstruments = new Api\PaymentInstrumentsApi($this->client);
        $this->plans = new Api\PlansApi($this->client);
        $this->products = new Api\ProductsApi($this->client);
        $this->quotes = new Api\QuotesApi($this->client);
        $this->purchase = new Api\PurchaseApi($this->client);
        $this->search = new Api\SearchApi($this->client);
        $this->shippingRates = new Api\ShippingRatesApi($this->client);
        $this->subscriptions = new Api\SubscriptionsApi($this->client);
        $this->subscriptionPauses = new Api\SubscriptionPausesApi($this->client);
        $this->subscriptionCancellations = new Api\SubscriptionCancellationsApi($this->client);
        $this->subscriptionReactivations = new Api\SubscriptionReactivationsApi($this->client);
        $this->usages = new Api\UsagesApi($this->client);
        $this->tags = new Api\TagsApi($this->client);
        $this->paymentTokens = new Api\PaymentTokensApi($this->client);
        $this->digitalWallets = new Api\DigitalWalletsApi($this->client);
        $this->transactions = new Api\TransactionsApi($this->client);
        $this->payouts = new Api\PayoutsApi($this->client);
        $this->fees = new Api\FeesApi($this->client);
        $this->apiKeys = new Api\ApiKeysApi($this->client);
        $this->balanceTransactions = new Api\BalanceTransactionsApi($this->client);
        $this->billingPortals = new Api\BillingPortalsApi($this->client);
        $this->broadcastMessages = new Api\BroadcastMessagesApi($this->client);
        $this->depositRequests = new Api\DepositRequestsApi($this->client);
        $this->depositStrategies = new Api\DepositStrategiesApi($this->client);
        $this->depositCustomPropertySets = new Api\DepositCustomPropertySetsApi($this->client);
        $this->checkoutForms = new Api\CheckoutFormsApi($this->client);
        $this->serviceCredentials = new Api\ServiceCredentialsApi($this->client);
        $this->customDomains = new Api\CustomDomainsApi($this->client);
        $this->emailDeliverySettings = new Api\EmailDeliverySettingsApi($this->client);
        $this->emailMessages = new Api\EmailMessagesApi($this->client);
        $this->emailNotifications = new Api\EmailNotificationsApi($this->client);
        $this->events = new Api\EventsApi($this->client);
        $this->account = new Api\AccountApi($this->client);
        $this->gatewayAccounts = new Api\GatewayAccountsApi($this->client);
        $this->segments = new Api\SegmentsApi($this->client);
        $this->integrations = new Api\IntegrationsApi($this->client);
        $this->lists = new Api\ListsApi($this->client);
        $this->memberships = new Api\MembershipsApi($this->client);
        $this->organizations = new Api\OrganizationsApi($this->client);
        $this->paymentCardsBankNames = new Api\PaymentCardsBankNamesApi($this->client);
        $this->paymentMethods = new Api\PaymentMethodsApi($this->client);
        $this->payoutRequests = new Api\PayoutRequestsApi($this->client);
        $this->profile = new Api\ProfileApi($this->client);
        $this->previews = new Api\PreviewsApi($this->client);
        $this->roles = new Api\RolesApi($this->client);
        $this->sendThroughAttribution = new Api\SendThroughAttributionApi($this->client);
        $this->status = new Api\StatusApi($this->client);
        $this->tracking = new Api\TrackingApi($this->client);
        $this->users = new Api\UsersApi($this->client);
        $this->webhooks = new Api\WebhooksApi($this->client);
        $this->websites = new Api\WebsitesApi($this->client);
        $this->dataExports = new Api\DataExportsApi($this->client);
        $this->organizationExports = new Api\OrganizationExportsApi($this->client);
        $this->histograms = new Api\HistogramsApi($this->client);
        $this->reports = new Api\ReportsApi($this->client);
        $this->riskScoreRules = new Api\RiskScoreRulesApi($this->client);
        $this->riskScoreSimulationJobs = new Api\RiskScoreSimulationJobsApi($this->client);
        $this->allowlists = new Api\AllowlistsApi($this->client);
        $this->tagsRules = new Api\TagsRulesApi($this->client);
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    public function amlChecks(): Api\AmlChecksApi
    {
        return $this->amlChecks;
    }

    public function amlSettings(): Api\AmlSettingsApi
    {
        return $this->amlSettings;
    }

    public function files(): Api\FilesApi
    {
        return $this->files;
    }

    public function customerAuthentication(): Api\CustomerAuthenticationApi
    {
        return $this->customerAuthentication;
    }

    public function blocklists(): Api\BlocklistsApi
    {
        return $this->blocklists;
    }

    public function coupons(): Api\CouponsApi
    {
        return $this->coupons;
    }

    public function customFields(): Api\CustomFieldsApi
    {
        return $this->customFields;
    }

    public function customers(): Api\CustomersApi
    {
        return $this->customers;
    }

    public function disputes(): Api\DisputesApi
    {
        return $this->disputes;
    }

    public function externalIdentifiers(): Api\ExternalIdentifiersApi
    {
        return $this->externalIdentifiers;
    }

    public function externalServicesSettings(): Api\ExternalServicesSettingsApi
    {
        return $this->externalServicesSettings;
    }

    public function applicationInstances(): Api\ApplicationInstancesApi
    {
        return $this->applicationInstances;
    }

    public function applications(): Api\ApplicationsApi
    {
        return $this->applications;
    }

    public function invoices(): Api\InvoicesApi
    {
        return $this->invoices;
    }

    public function creditMemos(): Api\CreditMemosApi
    {
        return $this->creditMemos;
    }

    public function journalAccounts(): Api\JournalAccountsApi
    {
        return $this->journalAccounts;
    }

    public function journalEntries(): Api\JournalEntriesApi
    {
        return $this->journalEntries;
    }

    public function kycRequests(): Api\KycRequestsApi
    {
        return $this->kycRequests;
    }

    public function kycDocuments(): Api\KycDocumentsApi
    {
        return $this->kycDocuments;
    }

    public function kycSettings(): Api\KycSettingsApi
    {
        return $this->kycSettings;
    }

    public function paymentInstruments(): Api\PaymentInstrumentsApi
    {
        return $this->paymentInstruments;
    }

    public function plans(): Api\PlansApi
    {
        return $this->plans;
    }

    public function products(): Api\ProductsApi
    {
        return $this->products;
    }

    public function quotes(): Api\QuotesApi
    {
        return $this->quotes;
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

    public function subscriptions(): Api\SubscriptionsApi
    {
        return $this->subscriptions;
    }

    public function subscriptionPauses(): Api\SubscriptionPausesApi
    {
        return $this->subscriptionPauses;
    }

    public function subscriptionCancellations(): Api\SubscriptionCancellationsApi
    {
        return $this->subscriptionCancellations;
    }

    public function subscriptionReactivations(): Api\SubscriptionReactivationsApi
    {
        return $this->subscriptionReactivations;
    }

    public function usages(): Api\UsagesApi
    {
        return $this->usages;
    }

    public function tags(): Api\TagsApi
    {
        return $this->tags;
    }

    public function paymentTokens(): Api\PaymentTokensApi
    {
        return $this->paymentTokens;
    }

    public function digitalWallets(): Api\DigitalWalletsApi
    {
        return $this->digitalWallets;
    }

    public function transactions(): Api\TransactionsApi
    {
        return $this->transactions;
    }

    public function payouts(): Api\PayoutsApi
    {
        return $this->payouts;
    }

    public function fees(): Api\FeesApi
    {
        return $this->fees;
    }

    public function apiKeys(): Api\ApiKeysApi
    {
        return $this->apiKeys;
    }

    public function balanceTransactions(): Api\BalanceTransactionsApi
    {
        return $this->balanceTransactions;
    }

    public function billingPortals(): Api\BillingPortalsApi
    {
        return $this->billingPortals;
    }

    public function broadcastMessages(): Api\BroadcastMessagesApi
    {
        return $this->broadcastMessages;
    }

    public function depositRequests(): Api\DepositRequestsApi
    {
        return $this->depositRequests;
    }

    public function depositStrategies(): Api\DepositStrategiesApi
    {
        return $this->depositStrategies;
    }

    public function depositCustomPropertySets(): Api\DepositCustomPropertySetsApi
    {
        return $this->depositCustomPropertySets;
    }

    public function checkoutForms(): Api\CheckoutFormsApi
    {
        return $this->checkoutForms;
    }

    public function serviceCredentials(): Api\ServiceCredentialsApi
    {
        return $this->serviceCredentials;
    }

    public function customDomains(): Api\CustomDomainsApi
    {
        return $this->customDomains;
    }

    public function emailDeliverySettings(): Api\EmailDeliverySettingsApi
    {
        return $this->emailDeliverySettings;
    }

    public function emailMessages(): Api\EmailMessagesApi
    {
        return $this->emailMessages;
    }

    public function emailNotifications(): Api\EmailNotificationsApi
    {
        return $this->emailNotifications;
    }

    public function events(): Api\EventsApi
    {
        return $this->events;
    }

    public function account(): Api\AccountApi
    {
        return $this->account;
    }

    public function gatewayAccounts(): Api\GatewayAccountsApi
    {
        return $this->gatewayAccounts;
    }

    public function segments(): Api\SegmentsApi
    {
        return $this->segments;
    }

    public function integrations(): Api\IntegrationsApi
    {
        return $this->integrations;
    }

    public function lists(): Api\ListsApi
    {
        return $this->lists;
    }

    public function memberships(): Api\MembershipsApi
    {
        return $this->memberships;
    }

    public function organizations(): Api\OrganizationsApi
    {
        return $this->organizations;
    }

    public function paymentCardsBankNames(): Api\PaymentCardsBankNamesApi
    {
        return $this->paymentCardsBankNames;
    }

    public function paymentMethods(): Api\PaymentMethodsApi
    {
        return $this->paymentMethods;
    }

    public function payoutRequests(): Api\PayoutRequestsApi
    {
        return $this->payoutRequests;
    }

    public function profile(): Api\ProfileApi
    {
        return $this->profile;
    }

    public function previews(): Api\PreviewsApi
    {
        return $this->previews;
    }

    public function roles(): Api\RolesApi
    {
        return $this->roles;
    }

    public function sendThroughAttribution(): Api\SendThroughAttributionApi
    {
        return $this->sendThroughAttribution;
    }

    public function status(): Api\StatusApi
    {
        return $this->status;
    }

    public function tracking(): Api\TrackingApi
    {
        return $this->tracking;
    }

    public function users(): Api\UsersApi
    {
        return $this->users;
    }

    public function webhooks(): Api\WebhooksApi
    {
        return $this->webhooks;
    }

    public function websites(): Api\WebsitesApi
    {
        return $this->websites;
    }

    public function dataExports(): Api\DataExportsApi
    {
        return $this->dataExports;
    }

    public function organizationExports(): Api\OrganizationExportsApi
    {
        return $this->organizationExports;
    }

    public function histograms(): Api\HistogramsApi
    {
        return $this->histograms;
    }

    public function reports(): Api\ReportsApi
    {
        return $this->reports;
    }

    public function riskScoreRules(): Api\RiskScoreRulesApi
    {
        return $this->riskScoreRules;
    }

    public function riskScoreSimulationJobs(): Api\RiskScoreSimulationJobsApi
    {
        return $this->riskScoreSimulationJobs;
    }

    public function allowlists(): Api\AllowlistsApi
    {
        return $this->allowlists;
    }

    public function tagsRules(): Api\TagsRulesApi
    {
        return $this->tagsRules;
    }
}
