<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Entities;

/**
 * Resources types.
 */
interface ResourceType
{
    const TYPE_CUSTOMERS = 'customers';
    const TYPE_PAYMENT_CARDS = 'payment-cards';
    const TYPE_PAYMENTS = 'payments';
    const TYPE_SUBSCRIPTIONS = 'subscriptions';
    const TYPE_WEBSITES = 'websites';
    const TYPE_CONTACTS = 'contacts';
    const TYPE_AUTHENTICATION_OPTIONS = 'authentication-options';
    const TYPE_AUTHENTICATION_TOKENS = 'authentication-tokens';
    const TYPE_BANK_ACCOUNTS = 'bank-accounts';
    const TYPE_BLACKLISTS = 'blacklists';
    const TYPE_CREDENTIALS = 'credentials';
    const TYPE_CUSTOM_FIELDS = 'custom-fields';
    const TYPE_DISPUTES = 'disputes';
    const TYPE_GATEWAY_ACCOUNTS = 'gateway-accounts';
    const TYPE_INVOICES = 'invoices';
    const TYPE_LEAD_SOURCES = 'lead-sources';
    const TYPE_LAYOUTS = 'layouts';
    const TYPE_ORGANIZATIONS = 'organizations';
    const TYPE_PASSWORD_TOKENS = 'password-tokens';
    const TYPE_PLANS = 'plans';
    const TYPE_QUEUE = 'queue';
    const TYPE_TRANSACTIONS = 'transactions';
    const TYPE_TOKENS = 'tokens';

    const TYPE_CUSTOMER = 'customer';
    const TYPE_WEBSITE = 'website';
    const TYPE_PAYMENT_CARD = 'payment-card';
    const TYPE_PAYMENT_GATEWAY = 'payment-gateway';
    const TYPE_SUBSCRIPTION = 'subscription';
    const TYPE_TRANSACTION = 'transaction';
}
