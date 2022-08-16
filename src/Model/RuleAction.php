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

    public const NAME_CREATE_TAXJAR_TRANSACTION = 'create-taxjar-transaction';

    public const NAME_DECLINE_TRANSACTION = 'decline-transaction';

    public const NAME_DISPLAY_MESSAGE = 'display-message';

    public const NAME_DISPLAY_OTHER_CHOICES = 'display-other-choices';

    public const NAME_GUESS_PAYMENT_CARD_EXPIRATION = 'guess-payment-card-expiration';

    public const NAME_OFFER_PURCHASE_BUMP = 'offer-purchase-bump';

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

    public const NAME_TRIGGER_WEBHOOK = 'trigger-webhook';

    public const NAME_UPDATE_INTUIT_QUICKBOOKS_INVOICE = 'update-intuit-quickbooks-invoice';

    public const NAME_VOID_INTUIT_QUICKBOOKS_INVOICE = 'void-intuit-quickbooks-invoice';

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
            case 'trigger-webhook':
                return new TriggerWebhook($data);
            case 'create-taxjar-transaction':
                return new CreateTaxjarTransaction($data);
            case 'request-kyc':
                return new RequestKyc($data);
            case 'perform-experian-check':
                return new PerformExperianCheck($data);
            case 'create-intuit-quickbooks-balance-transaction-entry':
                return new CreateIntuitQuickbooksBalanceTransactionEntry($data);
            case 'update-intuit-quickbooks-invoice':
                return new UpdateIntuitQuickbooksInvoice($data);
            case 'decline-transaction':
                return new DeclineTransaction($data);
            case 'create-keap-infusionsoft-payment':
                return new CreateInfusionsoftPayment($data);
            case 'send-email':
                return new SendEmail($data);
            case 'schedule-reminder':
                return new ScheduleReminder($data);
            case 'display-other-choices':
                return new DisplayOtherChoices($data);
            case 'offer-purchase-bump':
                return new OfferPurchaseBump($data);
            case 'create-keap-infusionsoft-order':
                return new CreateInfusionsoftOrder($data);
            case 'tag-or-untag-customer':
                return new TagOrUntagCustomer($data);
            case 'stop-subscriptions':
                return new StopSubscriptions($data);
            case 'schedule-invoice-retry':
                return new ScheduleInvoiceRetry($data);
            case 'adjust-ready-to-pay':
                return new AdjustReadyToPay($data);
            case 'remove-reminder':
                return new RemoveReminder($data);
            case 'pick-gateway-account':
                return new PickGatewayAccount($data);
            case 'schedule-payment':
                return new SchedulePayment($data);
            case 'create-intuit-quickbooks-payment':
                return new CreateIntuitQuickbooksPayment($data);
            case 'create-intuit-quickbooks-refund-receipt':
                return new CreateIntuitQuickbooksRefundReceipt($data);
            case 'void-intuit-quickbooks-invoice':
                return new VoidIntuitQuickbooksInvoice($data);
            case 'add-risk-score':
                return new AddRiskScore($data);
            case 'cancel-scheduled-payments':
                return new CancelScheduledPayments($data);
            case 'guess-payment-card-expiration':
                return new GuessPaymentCardExpiration($data);
            case 'blocklist':
                return new AddBlocklist($data);
            case 'reset-reminder':
                return new ResetReminder($data);
            case 'create-intuit-quickbooks-invoice':
                return new CreateIntuitQuickbooksInvoice($data);
            case 'display-message':
                return new DisplayMessage($data);
            case 'create-intuit-quickbooks-revenue-recognition-entry':
                return new CreateIntuitQuickbooksRevenueRecognitionEntry($data);
        }

        throw new InvalidArgumentException("Unsupported name value: '{$data['name']}'");
    }

    /**
     * @psalm-return self::NAME_* $name
     */
    public function getName(): string
    {
        return $this->fields['name'];
    }

    public function getStatus(): ?OnOff
    {
        return $this->fields['status'] ?? null;
    }

    public function setStatus(null|OnOff|string $status): self
    {
        if ($status !== null && !($status instanceof \Rebilly\Sdk\Model\OnOff)) {
            $status = \Rebilly\Sdk\Model\OnOff::from($status);
        }

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
            $data['status'] = $this->fields['status']?->value;
        }

        return $data;
    }

    /**
     * @psalm-param self::NAME_* $name
     */
    private function setName(string $name): self
    {
        $this->fields['name'] = $name;

        return $this;
    }
}
