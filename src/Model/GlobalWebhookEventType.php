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

enum GlobalWebhookEventType: string
{
    case AML_LIST_POSSIBLY_MATCHED = 'aml-list-possibly-matched';
    case APPLICATION_INSTANCE_DISABLED = 'application-instance-disabled';
    case APPLICATION_INSTANCE_ENABLED = 'application-instance-enabled';
    case BALANCE_TRANSACTION_SETTLED = 'balance-transaction-settled';
    case CREDIT_MEMO_APPLIED = 'credit-memo-applied';
    case CREDIT_MEMO_CREATED = 'credit-memo-created';
    case CREDIT_MEMO_MODIFIED = 'credit-memo-modified';
    case CREDIT_MEMO_PARTIALLY_APPLIED = 'credit-memo-partially-applied';
    case CREDIT_MEMO_VOIDED = 'credit-memo-voided';
    case CUSTOMER_CREATED = 'customer-created';
    case CUSTOMER_MERGED = 'customer-merged';
    case CUSTOMER_ONE_TIME_PASSWORD_REQUESTED = 'customer-one-time-password-requested';
    case CUSTOMER_REDIRECTED_OFFSITE = 'customer-redirected-offsite';
    case CUSTOMER_RETURNED = 'customer-returned';
    case CUSTOMER_UPDATED = 'customer-updated';
    case DISPUTE_CREATED = 'dispute-created';
    case DISPUTE_MODIFIED = 'dispute-modified';
    case EXPERIAN_CHECK_PERFORMED = 'experian-check-performed';
    case GATEWAY_ACCOUNT_DOWNTIME_ENDED = 'gateway-account-downtime-ended';
    case GATEWAY_ACCOUNT_DOWNTIME_STARTED = 'gateway-account-downtime-started';
    case GATEWAY_ACCOUNT_LIMIT_REACHED = 'gateway-account-limit-reached';
    case GATEWAY_ACCOUNT_ONBOARDING_COMPLETED = 'gateway-account-onboarding-completed';
    case GATEWAY_ACCOUNT_ONBOARDING_FAILED = 'gateway-account-onboarding-failed';
    case GATEWAY_ACCOUNT_REQUESTED = 'gateway-account-requested';
    case INVOICE_ABANDONED = 'invoice-abandoned';
    case INVOICE_CREATED = 'invoice-created';
    case INVOICE_ISSUED = 'invoice-issued';
    case INVOICE_MODIFIED = 'invoice-modified';
    case INVOICE_PAID = 'invoice-paid';
    case INVOICE_PARTIALLY_PAID = 'invoice-partially-paid';
    case INVOICE_PARTIALLY_REFUNDED = 'invoice-partially-refunded';
    case INVOICE_PAST_DUE = 'invoice-past-due';
    case INVOICE_PAST_DUE_REMINDER = 'invoice-past-due-reminder';
    case INVOICE_REFUNDED = 'invoice-refunded';
    case INVOICE_REISSUED = 'invoice-reissued';
    case INVOICE_TAX_CALCULATION_FAILED = 'invoice-tax-calculation-failed';
    case INVOICE_VOIDED = 'invoice-voided';
    case KYC_DOCUMENT_ACCEPTED = 'kyc-document-accepted';
    case KYC_DOCUMENT_CREATED = 'kyc-document-created';
    case KYC_DOCUMENT_MODIFIED = 'kyc-document-modified';
    case KYC_DOCUMENT_REJECTED = 'kyc-document-rejected';
    case KYC_DOCUMENT_REVIEWED = 'kyc-document-reviewed';
    case KYC_DOCUMENT_ARCHIVED = 'kyc-document-archived';
    case KYC_REQUEST_ATTEMPTED = 'kyc-request-attempted';
    case KYC_REQUEST_FAILED = 'kyc-request-failed';
    case KYC_REQUEST_FULFILLED = 'kyc-request-fulfilled';
    case KYC_REQUEST_PARTIALLY_FULFILLED = 'kyc-request-partially-fulfilled';
    case LEAD_SOURCE_CHANGED = 'lead-source-changed';
    case NSF_RESPONSE_RECEIVED = 'nsf-response-received';
    case OFFSITE_PAYMENT_COMPLETED = 'offsite-payment-completed';
    case ORDER_COMPLETED = 'order-completed';
    case PAYMENT_CARD_CREATED = 'payment-card-created';
    case PAYMENT_CARD_EXPIRATION_REMINDER = 'payment-card-expiration-reminder';
    case PAYMENT_CARD_EXPIRED = 'payment-card-expired';
    case PAYMENT_INSTRUMENT_MODIFIED = 'payment-instrument-modified';
    case RENEWAL_INVOICE_ISSUED = 'renewal-invoice-issued';
    case RENEWAL_INVOICE_PAYMENT_CANCELED = 'renewal-invoice-payment-canceled';
    case RENEWAL_INVOICE_PAYMENT_DECLINED = 'renewal-invoice-payment-declined';
    case RISK_SCORE_CHANGED = 'risk-score-changed';
    case SUBSCRIPTION_ACTIVATED = 'subscription-activated';
    case SUBSCRIPTION_CANCELED = 'subscription-canceled';
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
    case SUBSCRIPTION_TRIAL_ENDED = 'subscription-trial-ended';
    case SUBSCRIPTION_UPGRADED = 'subscription-upgraded';
    case TRANSACTION_AMOUNT_DISCREPANCY_FOUND = 'transaction-amount-discrepancy-found';
    case TRANSACTION_DECLINED = 'transaction-declined';
    case TRANSACTION_DISCREPANCY_FOUND = 'transaction-discrepancy-found';
    case TRANSACTION_PROCESS_REQUESTED = 'transaction-process-requested';
    case TRANSACTION_PROCESSED = 'transaction-processed';
    case TRANSACTION_RECONCILED = 'transaction-reconciled';
    case TRANSACTION_TIMEOUT_RESOLVED = 'transaction-timeout-resolved';
    case WAITING_GATEWAY_TRANSACTION_COMPLETED = 'waiting-gateway-transaction-completed';
}
