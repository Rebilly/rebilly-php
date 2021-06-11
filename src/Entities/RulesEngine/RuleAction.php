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

namespace Rebilly\Entities\RulesEngine;

use DomainException;
use Rebilly\Rest\Resource;

/**
 * Class RuleAction.
 */
abstract class RuleAction extends Resource
{
    public const REQUIRED_NAME = 'Name is required';

    public const UNEXPECTED_STATUS = 'Unexpected status. Only %s statuses are supported';

    public const UNEXPECTED_NAME = 'Unexpected name. Only %s names are supported';

    public const STATUS_ACTIVE = 'active';

    public const STATUS_INACTIVE = 'inactive';

    public const NAME_BLACKLIST = 'blacklist';

    public const NAME_CANCEL_SCHEDULED_PAYMENTS = 'cancel-scheduled-payments';

    public const NAME_GUESS_PAYMENT_CARD_EXPIRATION = 'guess-payment-card-expiration';

    public const NAME_PICK_GATEWAY_ACCOUNT = 'pick-gateway-account';

    public const NAME_SCHEDULE_PAYMENT = 'schedule-payment';

    public const NAME_SCHEDULE_INVOICE_RETRY = 'schedule-invoice-retry';

    public const NAME_SEND_EMAIL = 'send-email';

    public const NAME_TRIGGER_WEBHOOK = 'trigger-webhook';

    public const NAME_STOP_SUBSCRIPTIONS = 'stop-subscriptions';

    public const NAME_ADD_RISK_SCORE = 'add-risk-score';

    public const NAME_REQUEST_KYC = 'request-kyc';

    public const NAME_TAG_OR_UNTAG_CUSTOMER = 'tag-or-untag-customer';

    /**
     * @return string[]|array
     */
    public static function statuses(): array
    {
        return [
            self::STATUS_ACTIVE,
            self::STATUS_INACTIVE,
        ];
    }

    /**
     * @return string[]|array
     */
    public static function names(): array
    {
        return [
            self::NAME_BLACKLIST,
            self::NAME_CANCEL_SCHEDULED_PAYMENTS,
            self::NAME_GUESS_PAYMENT_CARD_EXPIRATION,
            self::NAME_PICK_GATEWAY_ACCOUNT,
            self::NAME_SCHEDULE_PAYMENT,
            self::NAME_SCHEDULE_INVOICE_RETRY,
            self::NAME_SEND_EMAIL,
            self::NAME_TRIGGER_WEBHOOK,
            self::NAME_STOP_SUBSCRIPTIONS,
            self::NAME_ADD_RISK_SCORE,
            self::NAME_REQUEST_KYC,
            self::NAME_TAG_OR_UNTAG_CUSTOMER,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function __construct(array $data = [])
    {
        parent::__construct(['name' => $this->actionName()] + $data);
    }

    /**
     * @param array $data
     *
     * @return RuleAction
     */
    public static function createFromData(array $data): self
    {
        if (!isset($data['name'])) {
            throw new DomainException(self::REQUIRED_NAME);
        }

        switch ($data['name']) {
            case self::NAME_BLACKLIST:
                $action = new Actions\Blacklist($data);

                break;
            case self::NAME_CANCEL_SCHEDULED_PAYMENTS:
                $action = new Actions\CancelScheduledPayments($data);

                break;
            case self::NAME_GUESS_PAYMENT_CARD_EXPIRATION:
                $action = new Actions\GuessPaymentCardExpiration($data);

                break;
            case self::NAME_PICK_GATEWAY_ACCOUNT:
                $action = new Actions\PickGatewayAccount($data);

                break;
            case self::NAME_SCHEDULE_PAYMENT:
                $action = new Actions\SchedulePayment($data);

                break;
            case self::NAME_SCHEDULE_INVOICE_RETRY:
                $action = new Actions\ScheduleInvoiceRetry($data);

                break;
            case self::NAME_SEND_EMAIL:
                $action = new Actions\SendEmail($data);

                break;
            case self::NAME_TRIGGER_WEBHOOK:
                $action = new Actions\TriggerWebhook($data);

                break;
            case self::NAME_STOP_SUBSCRIPTIONS:
                $action = new Actions\StopSubscriptions($data);

                break;
            case self::NAME_ADD_RISK_SCORE:
                $action = new Actions\AddRiskScore($data);

                break;
            case self::NAME_REQUEST_KYC:
                $action = new Actions\RequestKyc($data);

                break;
            case self::NAME_TAG_OR_UNTAG_CUSTOMER:
                $action = new Actions\TagOrUntagCustomer($data);

                break;
            default:
                throw new DomainException(
                    sprintf(self::UNEXPECTED_NAME, implode(', ', self::names()))
                );
        }

        return $action;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->getAttribute('status') === self::STATUS_ACTIVE;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->getAttribute('status');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setStatus($value): self
    {
        if (!in_array($value, self::statuses(), true)) {
            throw new DomainException(sprintf(self::UNEXPECTED_STATUS, implode(', ', self::statuses())));
        }

        return $this->setAttribute('status', $value);
    }

    /**
     * @return string
     */
    abstract public function actionName(): string;
}
