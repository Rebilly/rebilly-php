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

use InvalidArgumentException;
use JsonSerializable;

abstract class RuleAction implements JsonSerializable
{
    public const NAME_ABANDON_SCHEDULED_PAYMENTS = 'abandon-scheduled-payments';

    public const NAME_ADD_RISK_SCORE = 'add-risk-score';

    public const NAME_ADJUST_READY_TO_PAY = 'adjust-ready-to-pay';

    public const NAME_BLOCKLIST = 'blocklist';

    public const NAME_CANCEL_SCHEDULED_PAYMENTS = 'cancel-scheduled-payments';

    public const NAME_CREATE_INTUIT_QUICKBOOKS_BALANCE_TRANSACTION_ENTRY = 'create-intuit-quickbooks-balance-transaction-entry';

    public const NAME_CREATE_INTUIT_QUICKBOOKS_INVOICE = 'create-intuit-quickbooks-invoice';

    public const NAME_CREATE_INTUIT_QUICKBOOKS_PAYMENT = 'create-intuit-quickbooks-payment';

    public const NAME_CREATE_INTUIT_QUICKBOOKS_REFUND_RECEIPT = 'create-intuit-quickbooks-refund-receipt';

    public const NAME_CREATE_INTUIT_QUICKBOOKS_REVENUE_RECOGNITION_ENTRY = 'create-intuit-quickbooks-revenue-recognition-entry';

    public const NAME_CREATE_KEAP_INFUSIONSOFT_ORDER = 'create-keap-infusionsoft-order';

    public const NAME_CREATE_KEAP_INFUSIONSOFT_PAYMENT = 'create-keap-infusionsoft-payment';

    public const NAME_DECLINE_TRANSACTION = 'decline-transaction';

    public const NAME_CHECK_ONTARIO_RESTRICTION = 'check-ontario-restriction';

    public const NAME_DISPLAY_OTHER_CHOICES = 'display-other-choices';

    public const NAME_GUESS_PAYMENT_CARD_EXPIRATION = 'guess-payment-card-expiration';

    public const NAME_PERFORM_EXPERIAN_CHECK = 'perform-experian-check';

    public const NAME_PICK_GATEWAY_ACCOUNT = 'pick-gateway-account';

    public const NAME_REMOVE_REMINDER = 'remove-reminder';

    public const NAME_REQUEST_KYC = 'request-kyc';

    public const NAME_RESET_REMINDER = 'reset-reminder';

    public const NAME_SCHEDULE_INVOICE_RETRY = 'schedule-invoice-retry';

    public const NAME_SCHEDULE_PAYMENT = 'schedule-payment';

    public const NAME_SCHEDULE_REMINDER = 'schedule-reminder';

    public const NAME_SEND_EMAIL = 'send-email';

    public const NAME_STOP_SUBSCRIPTIONS = 'stop-subscriptions';

    public const NAME_TAG_OR_UNTAG_CUSTOMER = 'tag-or-untag-customer';

    public const NAME_UPDATE_INTUIT_QUICKBOOKS_INVOICE = 'update-intuit-quickbooks-invoice';

    public const NAME_VOID_INTUIT_QUICKBOOKS_INVOICE = 'void-intuit-quickbooks-invoice';

    public const STATUS_ACTIVE = 'active';

    public const STATUS_INACTIVE = 'inactive';

    private array $fields = [];

    protected function __construct(array $data = [])
    {
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
    }

    public static function from(array $data = []): self
    {
        switch ($data['name']) {
            case 'abandon-scheduled-payments':
                return RuleActionAbandonScheduledPayments::from($data);
            case 'blocklist':
                return RuleActionAddBlockList::from($data);
            case 'add-risk-score':
                return RuleActionAddRiskScore::from($data);
            case 'adjust-ready-to-pay':
                return RuleActionAdjustReadyToPay::from($data);
            case 'adjust-ready-to-payout':
                return RuleActionAdjustReadyToPayout::from($data);
            case 'cancel-scheduled-payments':
                return RuleActionCancelScheduledPayments::from($data);
            case 'check-ontario-restriction':
                return RuleActionCheckOntarioRestriction::from($data);
            case 'create-keap-infusionsoft-order':
                return RuleActionCreateInfusionsoftOrder::from($data);
            case 'create-keap-infusionsoft-payment':
                return RuleActionCreateInfusionsoftPayment::from($data);
            case 'create-intuit-quickbooks-balance-transaction-entry':
                return RuleActionCreateIntuitQuickbooksBalanceTransactionEntry::from($data);
            case 'create-intuit-quickbooks-payment':
                return RuleActionCreateIntuitQuickbooksPayment::from($data);
            case 'create-intuit-quickbooks-refund-receipt':
                return RuleActionCreateIntuitQuickbooksRefundReceipt::from($data);
            case 'create-intuit-quickbooks-revenue-recognition-entry':
                return RuleActionCreateIntuitQuickbooksRevenueRecognitionEntry::from($data);
            case 'decline-transaction':
                return RuleActionDeclineTransaction::from($data);
            case 'display-other-choices':
                return RuleActionDisplayOtherChoices::from($data);
            case 'guess-payment-card-expiration':
                return RuleActionGuessPaymentCardExpiration::from($data);
            case 'perform-experian-check':
                return RuleActionPerformExperianCheck::from($data);
            case 'pick-gateway-account':
                return RuleActionPickGatewayAccount::from($data);
            case 'request-kyc':
                return RuleActionRequestKyc::from($data);
            case 'schedule-invoice-retry':
                return RuleActionScheduleInvoiceRetry::from($data);
            case 'schedule-payment':
                return RuleActionSchedulePayment::from($data);
            case 'schedule-reminder':
                return RuleActionScheduleReminder::from($data);
            case 'send-email':
                return RuleActionSendEmail::from($data);
            case 'stop-subscriptions':
                return RuleActionStopSubscriptions::from($data);
            case 'tag-or-untag-customer':
                return RuleActionTagOrUntagCustomer::from($data);
            case 'update-intuit-quickbooks-invoice':
                return RuleActionUpdateIntuitQuickbooksInvoice::from($data);
            case 'void-intuit-quickbooks-invoice':
                return RuleActionVoidIntuitQuickbooksInvoice::from($data);
        }

        throw new InvalidArgumentException("Unsupported name value: '{$data['name']}'");
    }

    public function getName(): string
    {
        return $this->fields['name'];
    }

    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    public function setStatus(null|string $status): static
    {
        $this->fields['status'] = $status;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('name', $this->fields)) {
            $data['name'] = $this->fields['name'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }

        return $data;
    }

    private function setName(string $name): static
    {
        $this->fields['name'] = $name;

        return $this;
    }
}
