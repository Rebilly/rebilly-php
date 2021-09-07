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

namespace Rebilly\Entities;

/**
 * Resources types.
 */
interface ResourceType
{
    public const TYPE_CUSTOMERS = 'customers';

    public const TYPE_PAYMENT_CARDS = 'payment-cards';

    public const TYPE_PAYMENTS = 'payments';

    public const TYPE_SUBSCRIPTIONS = 'subscriptions';

    public const TYPE_WEBSITES = 'websites';

    public const TYPE_AUTHENTICATION_OPTIONS = 'authentication-options';

    public const TYPE_AUTHENTICATION_TOKENS = 'authentication-tokens';

    public const TYPE_BANK_ACCOUNTS = 'bank-accounts';

    public const TYPE_BLOCKLISTS = 'blocklists';

    public const TYPE_CREDENTIALS = 'credentials';

    public const TYPE_CUSTOM_FIELDS = 'custom-fields';

    public const TYPE_DISPUTES = 'disputes';

    public const TYPE_GATEWAY_ACCOUNTS = 'gateway-accounts';

    public const TYPE_INVOICES = 'invoices';

    public const TYPE_LEAD_SOURCES = 'lead-sources';

    public const TYPE_ORGANIZATIONS = 'organizations';

    public const TYPE_PASSWORD_TOKENS = 'password-tokens';

    public const TYPE_PLANS = 'plans';

    public const TYPE_QUEUE = 'queue';

    public const TYPE_TRANSACTIONS = 'transactions';

    public const TYPE_TOKENS = 'tokens';

    public const TYPE_CUSTOMER = 'customer';

    public const TYPE_WEBSITE = 'website';

    public const TYPE_PAYMENT_CARD = 'payment-card';

    public const TYPE_PAYMENT_GATEWAY = 'payment-gateway';

    public const TYPE_SUBSCRIPTION = 'subscription';

    public const TYPE_TRANSACTION = 'transaction';

    public const TYPE_KYC = 'kyc';
}
