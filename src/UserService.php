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

class UserService
{
    private readonly Client $client;

    private readonly Api\ActivationApi $activation;

    private readonly Api\ApiKeysApi $apiKeys;

    private readonly Api\ApplicationInstancesApi $applicationInstances;

    private readonly Api\ApplicationsApi $applications;

    private readonly Api\BalanceTransactionsApi $balanceTransactions;

    private readonly Api\BillingPortalsApi $billingPortals;

    private readonly Api\BroadcastMessagesApi $broadcastMessages;

    private readonly Api\CheckoutFormsApi $checkoutForms;

    private readonly Api\CredentialHashesApi $credentialHashes;

    private readonly Api\CustomDomainsApi $customDomains;

    private readonly Api\DigitalWalletsApi $digitalWallets;

    private readonly Api\EmailDeliverySettingVerificationsApi $emailDeliverySettingVerifications;

    private readonly Api\EmailDeliverySettingsApi $emailDeliverySettings;

    private readonly Api\EmailMessagesApi $emailMessages;

    private readonly Api\EmailNotificationsApi $emailNotifications;

    private readonly Api\EventsApi $events;

    private readonly Api\ForgotPasswordApi $forgotPassword;

    private readonly Api\GatewayAccountsApi $gatewayAccounts;

    private readonly Api\GridSegmentsApi $gridSegments;

    private readonly Api\IntegrationsApi $integrations;

    private readonly Api\ListsApi $lists;

    private readonly Api\LogoutApi $logout;

    private readonly Api\MembershipsApi $memberships;

    private readonly Api\OrganizationExportsApi $organizationExports;

    private readonly Api\OrganizationsApi $organizations;

    private readonly Api\PaymentCardsBankNamesApi $paymentCardsBankNames;

    private readonly Api\PaymentGatewaysMetadataApi $paymentGatewaysMetadata;

    private readonly Api\PaymentMethodsApi $paymentMethods;

    private readonly Api\PermissionsEmulationApi $permissionsEmulation;

    private readonly Api\PreviewsApi $previews;

    private readonly Api\ProfileApi $profile;

    private readonly Api\ResetPasswordApi $resetPassword;

    private readonly Api\RolesApi $roles;

    private readonly Api\SendThroughAttributionApi $sendThroughAttribution;

    private readonly Api\SigninApi $signin;

    private readonly Api\SignupApi $signup;

    private readonly Api\StatusApi $status;

    private readonly Api\TrackingApi $tracking;

    private readonly Api\UsersApi $users;

    private readonly Api\WebhooksApi $webhooks;

    private readonly Api\WebsitesApi $websites;

    public function __construct(Client $client = null, array $config = [])
    {
        $this->client = $client ?? new Client($config);
        $this->activation = new Api\ActivationApi($this->client);
        $this->apiKeys = new Api\ApiKeysApi($this->client);
        $this->applicationInstances = new Api\ApplicationInstancesApi($this->client);
        $this->applications = new Api\ApplicationsApi($this->client);
        $this->balanceTransactions = new Api\BalanceTransactionsApi($this->client);
        $this->billingPortals = new Api\BillingPortalsApi($this->client);
        $this->broadcastMessages = new Api\BroadcastMessagesApi($this->client);
        $this->checkoutForms = new Api\CheckoutFormsApi($this->client);
        $this->credentialHashes = new Api\CredentialHashesApi($this->client);
        $this->customDomains = new Api\CustomDomainsApi($this->client);
        $this->digitalWallets = new Api\DigitalWalletsApi($this->client);
        $this->emailDeliverySettingVerifications = new Api\EmailDeliverySettingVerificationsApi($this->client);
        $this->emailDeliverySettings = new Api\EmailDeliverySettingsApi($this->client);
        $this->emailMessages = new Api\EmailMessagesApi($this->client);
        $this->emailNotifications = new Api\EmailNotificationsApi($this->client);
        $this->events = new Api\EventsApi($this->client);
        $this->forgotPassword = new Api\ForgotPasswordApi($this->client);
        $this->gatewayAccounts = new Api\GatewayAccountsApi($this->client);
        $this->gridSegments = new Api\GridSegmentsApi($this->client);
        $this->integrations = new Api\IntegrationsApi($this->client);
        $this->lists = new Api\ListsApi($this->client);
        $this->logout = new Api\LogoutApi($this->client);
        $this->memberships = new Api\MembershipsApi($this->client);
        $this->organizationExports = new Api\OrganizationExportsApi($this->client);
        $this->organizations = new Api\OrganizationsApi($this->client);
        $this->paymentCardsBankNames = new Api\PaymentCardsBankNamesApi($this->client);
        $this->paymentGatewaysMetadata = new Api\PaymentGatewaysMetadataApi($this->client);
        $this->paymentMethods = new Api\PaymentMethodsApi($this->client);
        $this->permissionsEmulation = new Api\PermissionsEmulationApi($this->client);
        $this->previews = new Api\PreviewsApi($this->client);
        $this->profile = new Api\ProfileApi($this->client);
        $this->resetPassword = new Api\ResetPasswordApi($this->client);
        $this->roles = new Api\RolesApi($this->client);
        $this->sendThroughAttribution = new Api\SendThroughAttributionApi($this->client);
        $this->signin = new Api\SigninApi($this->client);
        $this->signup = new Api\SignupApi($this->client);
        $this->status = new Api\StatusApi($this->client);
        $this->tracking = new Api\TrackingApi($this->client);
        $this->users = new Api\UsersApi($this->client);
        $this->webhooks = new Api\WebhooksApi($this->client);
        $this->websites = new Api\WebsitesApi($this->client);
    }

    public function activation(): Api\ActivationApi
    {
        return $this->activation;
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

    public function credentialHashes(): Api\CredentialHashesApi
    {
        return $this->credentialHashes;
    }

    public function customDomains(): Api\CustomDomainsApi
    {
        return $this->customDomains;
    }

    public function digitalWallets(): Api\DigitalWalletsApi
    {
        return $this->digitalWallets;
    }

    public function emailDeliverySettingVerifications(): Api\EmailDeliverySettingVerificationsApi
    {
        return $this->emailDeliverySettingVerifications;
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

    public function forgotPassword(): Api\ForgotPasswordApi
    {
        return $this->forgotPassword;
    }

    public function gatewayAccounts(): Api\GatewayAccountsApi
    {
        return $this->gatewayAccounts;
    }

    public function gridSegments(): Api\GridSegmentsApi
    {
        return $this->gridSegments;
    }

    public function integrations(): Api\IntegrationsApi
    {
        return $this->integrations;
    }

    public function lists(): Api\ListsApi
    {
        return $this->lists;
    }

    public function logout(): Api\LogoutApi
    {
        return $this->logout;
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

    public function paymentGatewaysMetadata(): Api\PaymentGatewaysMetadataApi
    {
        return $this->paymentGatewaysMetadata;
    }

    public function paymentMethods(): Api\PaymentMethodsApi
    {
        return $this->paymentMethods;
    }

    public function permissionsEmulation(): Api\PermissionsEmulationApi
    {
        return $this->permissionsEmulation;
    }

    public function previews(): Api\PreviewsApi
    {
        return $this->previews;
    }

    public function profile(): Api\ProfileApi
    {
        return $this->profile;
    }

    public function resetPassword(): Api\ResetPasswordApi
    {
        return $this->resetPassword;
    }

    public function roles(): Api\RolesApi
    {
        return $this->roles;
    }

    public function sendThroughAttribution(): Api\SendThroughAttributionApi
    {
        return $this->sendThroughAttribution;
    }

    public function signin(): Api\SigninApi
    {
        return $this->signin;
    }

    public function signup(): Api\SignupApi
    {
        return $this->signup;
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
