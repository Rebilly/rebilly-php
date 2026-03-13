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
use Rebilly\Sdk\Trait\HasMetadata;

abstract class RuleAction implements JsonSerializable
{
    use HasMetadata;

    public const NAME_ABANDON_SCHEDULED_PAYMENTS = 'abandon-scheduled-payments';

    public const NAME_ADD_RISK_SCORE = 'add-risk-score';

    public const NAME_ADJUST_READY_TO_PAY = 'adjust-ready-to-pay';

    public const NAME_ADJUST_READY_TO_PAYOUT = 'adjust-ready-to-payout';

    public const NAME_BLOCKLIST = 'blocklist';

    public const NAME_CANCEL_SCHEDULED_PAYMENTS = 'cancel-scheduled-payments';

    public const NAME_CREATE_INTUIT_QUICKBOOKS_BALANCE_TRANSACTION_ENTRY = 'create-intuit-quickbooks-balance-transaction-entry';

    public const NAME_CREATE_INTUIT_QUICKBOOKS_INVOICE = 'create-intuit-quickbooks-invoice';

    public const NAME_CREATE_INTUIT_QUICKBOOKS_PAYMENT = 'create-intuit-quickbooks-payment';

    public const NAME_CREATE_INTUIT_QUICKBOOKS_REFUND_RECEIPT = 'create-intuit-quickbooks-refund-receipt';

    public const NAME_CREATE_INTUIT_QUICKBOOKS_REVENUE_RECOGNITION_ENTRY = 'create-intuit-quickbooks-revenue-recognition-entry';

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

    public const NAME_TRIGGER_WEBHOOK = 'trigger-webhook';

    public const NAME_SHOW_DESCRIPTOR_DISCLAIMER = 'show-descriptor-disclaimer';

    public const STATUS_ACTIVE = 'active';

    public const STATUS_INACTIVE = 'inactive';

    private array $fields = [];

    protected function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        switch ($data['name']) {
            case 'abandon-scheduled-payments':
                return RuleActionAbandonScheduledPayments::from($data, $metadata);
            case 'blocklist':
                return RuleActionAddBlockList::from($data, $metadata);
            case 'add-risk-score':
                return RuleActionAddRiskScore::from($data, $metadata);
            case 'adjust-ready-to-pay':
                return RuleActionAdjustReadyToPay::from($data, $metadata);
            case 'adjust-ready-to-payout':
                return RuleActionAdjustReadyToPayout::from($data, $metadata);
            case 'cancel-scheduled-payments':
                return RuleActionCancelScheduledPayments::from($data, $metadata);
            case 'check-ontario-restriction':
                return RuleActionCheckOntarioRestriction::from($data, $metadata);
            case 'create-intuit-quickbooks-balance-transaction-entry':
                return RuleActionCreateIntuitQuickbooksBalanceTransactionEntry::from($data, $metadata);
            case 'create-intuit-quickbooks-invoice':
                return RuleActionCreateIntuitQuickbooksInvoice::from($data, $metadata);
            case 'create-intuit-quickbooks-payment':
                return RuleActionCreateIntuitQuickbooksPayment::from($data, $metadata);
            case 'create-intuit-quickbooks-refund-receipt':
                return RuleActionCreateIntuitQuickbooksRefundReceipt::from($data, $metadata);
            case 'create-intuit-quickbooks-revenue-recognition-entry':
                return RuleActionCreateIntuitQuickbooksRevenueRecognitionEntry::from($data, $metadata);
            case 'decline-transaction':
                return RuleActionDeclineTransaction::from($data, $metadata);
            case 'display-other-choices':
                return RuleActionDisplayOtherChoices::from($data, $metadata);
            case 'guess-payment-card-expiration':
                return RuleActionGuessPaymentCardExpiration::from($data, $metadata);
            case 'perform-experian-check':
                return RuleActionPerformExperianCheck::from($data, $metadata);
            case 'pick-gateway-account':
                return RuleActionPickGatewayAccount::from($data, $metadata);
            case 'request-kyc':
                return RuleActionRequestKyc::from($data, $metadata);
            case 'schedule-invoice-retry':
                return RuleActionScheduleInvoiceRetry::from($data, $metadata);
            case 'schedule-payment':
                return RuleActionSchedulePayment::from($data, $metadata);
            case 'schedule-reminder':
                return RuleActionScheduleReminder::from($data, $metadata);
            case 'send-email':
                return RuleActionSendEmail::from($data, $metadata);
            case 'stop-subscriptions':
                return RuleActionStopSubscriptions::from($data, $metadata);
            case 'tag-or-untag-customer':
                return RuleActionTagOrUntagCustomer::from($data, $metadata);
            case 'update-intuit-quickbooks-invoice':
                return RuleActionUpdateIntuitQuickbooksInvoice::from($data, $metadata);
            case 'void-intuit-quickbooks-invoice':
                return RuleActionVoidIntuitQuickbooksInvoice::from($data, $metadata);
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
