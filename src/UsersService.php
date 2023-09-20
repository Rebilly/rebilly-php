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

class UsersService
{
    private Client $client;

    private Api\AccountApi $account;

    private Api\ApiKeysApi $apiKeys;

    private Api\ApplicationInstancesApi $applicationInstances;

    private Api\ApplicationsApi $applications;

    private Api\BalanceTransactionsApi $balanceTransactions;

    private Api\BillingPortalsApi $billingPortals;

    private Api\BroadcastMessagesApi $broadcastMessages;

    private Api\CheckoutFormsApi $checkoutForms;

    private Api\CustomDomainsApi $customDomains;

    private Api\DigitalWalletsApi $digitalWallets;

    private Api\EmailDeliverySettingsApi $emailDeliverySettings;

    private Api\EmailMessagesApi $emailMessages;

    private Api\EmailNotificationsApi $emailNotifications;

    private Api\EventsApi $events;

    private Api\ExternalIdentifiersApi $externalIdentifiers;

    private Api\ExternalServicesSettingsApi $externalServicesSettings;

    private Api\GatewayAccountsApi $gatewayAccounts;

    private Api\IntegrationsApi $integrations;

    private Api\ListsApi $lists;

    private Api\MembershipsApi $memberships;

    private Api\OrganizationExportsApi $organizationExports;

    private Api\OrganizationsApi $organizations;

    private Api\PaymentCardsBankNamesApi $paymentCardsBankNames;

    private Api\PaymentInstrumentsApi $paymentInstruments;

    private Api\PaymentMethodsApi $paymentMethods;

    private Api\PreviewsApi $previews;

    private Api\ProfileApi $profile;

    private Api\RolesApi $roles;

    private Api\SegmentsApi $segments;

    private Api\SendThroughAttributionApi $sendThroughAttribution;

    private Api\ServiceCredentialsApi $serviceCredentials;

    private Api\StatusApi $status;

    private Api\TrackingApi $tracking;

    private Api\UsersApi $users;

    private Api\WebhooksApi $webhooks;

    private Api\WebsitesApi $websites;

    public function __construct(Client $client = null, array $config = [])
    {
        $this->client = $client ?? new Client($config);
        $this->account = new Api\AccountApi($this->client);
        $this->apiKeys = new Api\ApiKeysApi($this->client);
        $this->applicationInstances = new Api\ApplicationInstancesApi($this->client);
        $this->applications = new Api\ApplicationsApi($this->client);
        $this->balanceTransactions = new Api\BalanceTransactionsApi($this->client);
        $this->billingPortals = new Api\BillingPortalsApi($this->client);
        $this->broadcastMessages = new Api\BroadcastMessagesApi($this->client);
        $this->checkoutForms = new Api\CheckoutFormsApi($this->client);
        $this->customDomains = new Api\CustomDomainsApi($this->client);
        $this->digitalWallets = new Api\DigitalWalletsApi($this->client);
        $this->emailDeliverySettings = new Api\EmailDeliverySettingsApi($this->client);
        $this->emailMessages = new Api\EmailMessagesApi($this->client);
        $this->emailNotifications = new Api\EmailNotificationsApi($this->client);
        $this->events = new Api\EventsApi($this->client);
        $this->externalIdentifiers = new Api\ExternalIdentifiersApi($this->client);
        $this->externalServicesSettings = new Api\ExternalServicesSettingsApi($this->client);
        $this->gatewayAccounts = new Api\GatewayAccountsApi($this->client);
        $this->integrations = new Api\IntegrationsApi($this->client);
        $this->lists = new Api\ListsApi($this->client);
        $this->memberships = new Api\MembershipsApi($this->client);
        $this->organizationExports = new Api\OrganizationExportsApi($this->client);
        $this->organizations = new Api\OrganizationsApi($this->client);
        $this->paymentCardsBankNames = new Api\PaymentCardsBankNamesApi($this->client);
        $this->paymentInstruments = new Api\PaymentInstrumentsApi($this->client);
        $this->paymentMethods = new Api\PaymentMethodsApi($this->client);
        $this->previews = new Api\PreviewsApi($this->client);
        $this->profile = new Api\ProfileApi($this->client);
        $this->roles = new Api\RolesApi($this->client);
        $this->segments = new Api\SegmentsApi($this->client);
        $this->sendThroughAttribution = new Api\SendThroughAttributionApi($this->client);
        $this->serviceCredentials = new Api\ServiceCredentialsApi($this->client);
        $this->status = new Api\StatusApi($this->client);
        $this->tracking = new Api\TrackingApi($this->client);
        $this->users = new Api\UsersApi($this->client);
        $this->webhooks = new Api\WebhooksApi($this->client);
        $this->websites = new Api\WebsitesApi($this->client);
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    public function account(): Api\AccountApi
    {
        return $this->account;
    }

    public function apiKeys(): Api\ApiKeysApi
    {
        return $this->apiKeys;
    }

    public function applicationInstances(): Api\ApplicationInstancesApi
    {
        return $this->applicationInstances;
    }

    public function applications(): Api\ApplicationsApi
    {
        return $this->applications;
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

    public function checkoutForms(): Api\CheckoutFormsApi
    {
        return $this->checkoutForms;
    }

    public function customDomains(): Api\CustomDomainsApi
    {
        return $this->customDomains;
    }

    public function digitalWallets(): Api\DigitalWalletsApi
    {
        return $this->digitalWallets;
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

    public function externalIdentifiers(): Api\ExternalIdentifiersApi
    {
        return $this->externalIdentifiers;
    }

    public function externalServicesSettings(): Api\ExternalServicesSettingsApi
    {
        return $this->externalServicesSettings;
    }

    public function gatewayAccounts(): Api\GatewayAccountsApi
    {
        return $this->gatewayAccounts;
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

    public function organizationExports(): Api\OrganizationExportsApi
    {
        return $this->organizationExports;
    }

    public function organizations(): Api\OrganizationsApi
    {
        return $this->organizations;
    }

    public function paymentCardsBankNames(): Api\PaymentCardsBankNamesApi
    {
        return $this->paymentCardsBankNames;
    }

    public function paymentInstruments(): Api\PaymentInstrumentsApi
    {
        return $this->paymentInstruments;
    }

    public function paymentMethods(): Api\PaymentMethodsApi
    {
        return $this->paymentMethods;
    }

    public function previews(): Api\PreviewsApi
    {
        return $this->previews;
    }

    public function profile(): Api\ProfileApi
    {
        return $this->profile;
    }

    public function roles(): Api\RolesApi
    {
        return $this->roles;
    }

    public function segments(): Api\SegmentsApi
    {
        return $this->segments;
    }

    public function sendThroughAttribution(): Api\SendThroughAttributionApi
    {
        return $this->sendThroughAttribution;
    }

    public function serviceCredentials(): Api\ServiceCredentialsApi
    {
        return $this->serviceCredentials;
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
}
