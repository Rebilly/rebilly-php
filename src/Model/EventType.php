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

namespace Rebilly\Sdk\Model;

enum EventType: string
{
    case ACCOUNT_PASSWORD_RESET_REQUESTED = 'account-password-reset-requested';
    case ACCOUNT_VERIFICATION_REQUESTED = 'account-verification-requested';
    case AML_LIST_POSSIBLY_MATCHED = 'aml-list-possibly-matched';
    case APPLICATION_INSTANCE_DISABLED = 'application-instance-disabled';
    case APPLICATION_INSTANCE_ENABLED = 'application-instance-enabled';
    case BALANCE_TRANSACTION_SETTLED = 'balance-transaction-settled';
    case CUSTOMER_CREATED = 'customer-created';
    case CUSTOMER_ONE_TIME_PASSWORD_REQUESTED = 'customer-one-time-password-requested';
    case DISPUTE_CREATED = 'dispute-created';
    case DISPUTE_MODIFIED = 'dispute-modified';
    case EXPERIAN_CHECK_PERFORMED = 'experian-check-performed';
    case GATEWAY_ACCOUNT_DOWNTIME_ENDED = 'gateway-account-downtime-ended';
    case GATEWAY_ACCOUNT_DOWNTIME_STARTED = 'gateway-account-downtime-started';
    case GATEWAY_ACCOUNT_LIMIT_REACHED = 'gateway-account-limit-reached';
    case GATEWAY_ACCOUNT_ONBOARDING_COMPLETED = 'gateway-account-onboarding-completed';
    case GATEWAY_ACCOUNT_ONBOARDING_FAILED = 'gateway-account-onboarding-failed';
    case GATEWAY_ACCOUNT_REQUESTED = 'gateway-account-requested';
    case INVOICE_ISSUED = 'invoice-issued';
    case INVOICE_PAID = 'invoice-paid';
    case INVOICE_PARTIALLY_PAID = 'invoice-partially-paid';
    case INVOICE_PARTIALLY_REFUNDED = 'invoice-partially-refunded';
    case INVOICE_PAST_DUE = 'invoice-past-due';
    case INVOICE_PAST_DUE_REMINDER = 'invoice-past-due-reminder';
    case INVOICE_REFUNDED = 'invoice-refunded';
    case INVOICE_REVENUE_RECOGNIZED = 'invoice-revenue-recognized';
    case INVOICE_TAX_CALCULATION_FAILED = 'invoice-tax-calculation-failed';
    case KYC_DOCUMENT_ACCEPTED = 'kyc-document-accepted';
    case KYC_DOCUMENT_MODIFIED = 'kyc-document-modified';
    case KYC_DOCUMENT_REJECTED = 'kyc-document-rejected';
    case KYC_REQUEST_FULFILLED = 'kyc-request-fulfilled';
    case NSF_RESPONSE_RECEIVED = 'nsf-response-received';
    case ORDER_COMPLETED = 'order-completed';
    case PAYMENT_CARD_CREATED = 'payment-card-created';
    case PAYMENT_CARD_EXPIRATION_REMINDER = 'payment-card-expiration-reminder';
    case PAYMENT_CARD_EXPIRED = 'payment-card-expired';
    case READY_TO_PAY_REQUESTED = 'ready-to-pay-requested';
    case RENEWAL_INVOICE_ISSUED = 'renewal-invoice-issued';
    case RENEWAL_INVOICE_PAYMENT_CANCELED = 'renewal-invoice-payment-canceled';
    case RENEWAL_INVOICE_PAYMENT_DECLINED = 'renewal-invoice-payment-declined';
    case RISK_SCORE_CHANGED = 'risk-score-changed';
    case SUBSCRIPTION_ACTIVATED = 'subscription-activated';
    case SUBSCRIPTION_CANCELED = 'subscription-canceled';
    case SUBSCRIPTION_CREATED = 'subscription-created';
    case SUBSCRIPTION_DOWNGRADED = 'subscription-downgraded';
    case SUBSCRIPTION_MODIFIED = 'subscription-modified';
    case SUBSCRIPTION_PAUSED = 'subscription-paused';
    case SUBSCRIPTION_PAUSE_CREATED = 'subscription-pause-created';
    case SUBSCRIPTION_PAUSE_MODIFIED = 'subscription-pause-modified';
    case SUBSCRIPTION_PAUSE_REVOKED = 'subscription-pause-revoked';
    case SUBSCRIPTION_REACTIVATED = 'subscription-reactivated';
    case SUBSCRIPTION_RENEWAL_REMINDER = 'subscription-renewal-reminder';
    case SUBSCRIPTION_RENEWED = 'subscription-renewed';
    case SUBSCRIPTION_RESUMED = 'subscription-resumed';
    case SUBSCRIPTION_TRIAL_CONVERTED = 'subscription-trial-converted';
    case SUBSCRIPTION_TRIAL_END_CHANGED = 'subscription-trial-end-changed';
    case SUBSCRIPTION_TRIAL_END_REMINDER = 'subscription-trial-end-reminder';
    case SUBSCRIPTION_UPGRADED = 'subscription-upgraded';
    case TRANSACTION_AMOUNT_DISCREPANCY_FOUND = 'transaction-amount-discrepancy-found';
    case TRANSACTION_DECLINED = 'transaction-declined';
    case TRANSACTION_DISCREPANCY_FOUND = 'transaction-discrepancy-found';
    case TRANSACTION_PROCESS_REQUESTED = 'transaction-process-requested';
    case TRANSACTION_PROCESSED = 'transaction-processed';
}
