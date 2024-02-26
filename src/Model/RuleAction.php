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
            case 'add-risk-score':
                return new RuleActionAddRiskScore($data);
            case 'adjust-ready-to-pay':
                return new RuleActionAdjustReadyToPay($data);
            case 'adjust-ready-to-payout':
                return new RuleActionAdjustReadyToPayout($data);
            case 'blocklist':
                return new RuleActionAddBlockList($data);
            case 'cancel-scheduled-payments':
                return new RuleActionCancelScheduledPayments($data);
            case 'check-ontario-restriction':
                return new RuleActionCheckOntarioRestriction($data);
            case 'create-intuit-quickbooks-balance-transaction-entry':
                return new RuleActionCreateIntuitQuickbooksBalanceTransactionEntry($data);
            case 'create-intuit-quickbooks-invoice':
                return new RuleActionCreateIntuitQuickbooksInvoice($data);
            case 'create-intuit-quickbooks-payment':
                return new RuleActionCreateIntuitQuickbooksPayment($data);
            case 'create-intuit-quickbooks-refund-receipt':
                return new RuleActionCreateIntuitQuickbooksRefundReceipt($data);
            case 'create-intuit-quickbooks-revenue-recognition-entry':
                return new RuleActionCreateIntuitQuickbooksRevenueRecognitionEntry($data);
            case 'create-keap-infusionsoft-order':
                return new RuleActionCreateInfusionsoftOrder($data);
            case 'create-keap-infusionsoft-payment':
                return new RuleActionCreateInfusionsoftPayment($data);
            case 'decline-transaction':
                return new RuleActionDeclineTransaction($data);
            case 'display-message':
                return new RuleActionDisplayMessage($data);
            case 'display-other-choices':
                return new RuleActionDisplayOtherChoices($data);
            case 'guess-payment-card-expiration':
                return new RuleActionGuessPaymentCardExpiration($data);
            case 'offer-purchase-bump':
                return new RuleActionOfferPurchaseBump($data);
            case 'perform-experian-check':
                return new RuleActionPerformExperianCheck($data);
            case 'pick-gateway-account':
                return new RuleActionPickGatewayAccount($data);
            case 'remove-reminder':
                return new RuleActionRemoveReminder($data);
            case 'request-kyc':
                return new RuleActionRequestKyc($data);
            case 'reset-reminder':
                return new RuleActionResetReminder($data);
            case 'schedule-invoice-retry':
                return new RuleActionScheduleInvoiceRetry($data);
            case 'schedule-payment':
                return new RuleActionSchedulePayment($data);
            case 'schedule-reminder':
                return new RuleActionScheduleReminder($data);
            case 'send-email':
                return new RuleActionSendEmail($data);
            case 'stop-subscriptions':
                return new RuleActionStopSubscriptions($data);
            case 'tag-or-untag-customer':
                return new RuleActionTagOrUntagCustomer($data);
            case 'update-intuit-quickbooks-invoice':
                return new RuleActionUpdateIntuitQuickbooksInvoice($data);
            case 'void-intuit-quickbooks-invoice':
                return new RuleActionVoidIntuitQuickbooksInvoice($data);
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
