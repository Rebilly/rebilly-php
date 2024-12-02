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

use DateTimeImmutable;
use DateTimeInterface;
use JsonSerializable;

class PostTransactionRequest implements JsonSerializable
{
    public const TYPE_SALE = 'sale';

    public const TYPE_AUTHORIZE = 'authorize';

    public const TYPE_SETUP = 'setup';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('upsertCustomer', $data)) {
            $this->setUpsertCustomer($data['upsertCustomer']);
        }
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('limits', $data)) {
            $this->setLimits($data['limits']);
        }
        if (array_key_exists('websiteId', $data)) {
            $this->setWebsiteId($data['websiteId']);
        }
        if (array_key_exists('customerId', $data)) {
            $this->setCustomerId($data['customerId']);
        }
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
        }
        if (array_key_exists('amount', $data)) {
            $this->setAmount($data['amount']);
        }
        if (array_key_exists('invoiceIds', $data)) {
            $this->setInvoiceIds($data['invoiceIds']);
        }
        if (array_key_exists('paymentInstruction', $data)) {
            $this->setPaymentInstruction($data['paymentInstruction']);
        }
        if (array_key_exists('billingAddress', $data)) {
            $this->setBillingAddress($data['billingAddress']);
        }
        if (array_key_exists('requestId', $data)) {
            $this->setRequestId($data['requestId']);
        }
        if (array_key_exists('gatewayAccountId', $data)) {
            $this->setGatewayAccountId($data['gatewayAccountId']);
        }
        if (array_key_exists('description', $data)) {
            $this->setDescription($data['description']);
        }
        if (array_key_exists('notificationUrl', $data)) {
            $this->setNotificationUrl($data['notificationUrl']);
        }
        if (array_key_exists('redirectUrl', $data)) {
            $this->setRedirectUrl($data['redirectUrl']);
        }
        if (array_key_exists('customFields', $data)) {
            $this->setCustomFields($data['customFields']);
        }
        if (array_key_exists('riskMetadata', $data)) {
            $this->setRiskMetadata($data['riskMetadata']);
        }
        if (array_key_exists('isProcessedOutside', $data)) {
            $this->setIsProcessedOutside($data['isProcessedOutside']);
        }
        if (array_key_exists('isMerchantInitiated', $data)) {
            $this->setIsMerchantInitiated($data['isMerchantInitiated']);
        }
        if (array_key_exists('processedTime', $data)) {
            $this->setProcessedTime($data['processedTime']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getUpsertCustomer(): ?bool
    {
        return $this->fields['upsertCustomer'] ?? null;
    }

    public function setUpsertCustomer(null|bool $upsertCustomer): static
    {
        $this->fields['upsertCustomer'] = $upsertCustomer;

        return $this;
    }

    public function getType(): string
    {
        return $this->fields['type'];
    }

    public function setType(string $type): static
    {
        $this->fields['type'] = $type;

        return $this;
    }

    public function getLimits(): ?TransactionLimitAmount
    {
        return $this->fields['limits'] ?? null;
    }

    public function setLimits(null|TransactionLimitAmount|array $limits): static
    {
        if ($limits !== null && !($limits instanceof TransactionLimitAmount)) {
            $limits = TransactionLimitAmount::from($limits);
        }

        $this->fields['limits'] = $limits;

        return $this;
    }

    public function getWebsiteId(): string
    {
        return $this->fields['websiteId'];
    }

    public function setWebsiteId(string $websiteId): static
    {
        $this->fields['websiteId'] = $websiteId;

        return $this;
    }

    public function getCustomerId(): string
    {
        return $this->fields['customerId'];
    }

    public function setCustomerId(string $customerId): static
    {
        $this->fields['customerId'] = $customerId;

        return $this;
    }

    public function getCurrency(): string
    {
        return $this->fields['currency'];
    }

    public function setCurrency(string $currency): static
    {
        $this->fields['currency'] = $currency;

        return $this;
    }

    public function getAmount(): float
    {
        return $this->fields['amount'];
    }

    public function setAmount(float|string $amount): static
    {
        if (is_string($amount)) {
            $amount = (float) $amount;
        }

        $this->fields['amount'] = $amount;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getInvoiceIds(): ?array
    {
        return $this->fields['invoiceIds'] ?? null;
    }

    /**
     * @param null|string[] $invoiceIds
     */
    public function setInvoiceIds(null|array $invoiceIds): static
    {
        $this->fields['invoiceIds'] = $invoiceIds;

        return $this;
    }

    public function getPaymentInstruction(): ?PaymentInstruction
    {
        return $this->fields['paymentInstruction'] ?? null;
    }

    public function setPaymentInstruction(null|PaymentInstruction|array $paymentInstruction): static
    {
        if ($paymentInstruction !== null && !($paymentInstruction instanceof PaymentInstruction)) {
            $paymentInstruction = PaymentInstructionFactory::from($paymentInstruction);
        }

        $this->fields['paymentInstruction'] = $paymentInstruction;

        return $this;
    }

    public function getBillingAddress(): ?ContactObject
    {
        return $this->fields['billingAddress'] ?? null;
    }

    public function setBillingAddress(null|ContactObject|array $billingAddress): static
    {
        if ($billingAddress !== null && !($billingAddress instanceof ContactObject)) {
            $billingAddress = ContactObject::from($billingAddress);
        }

        $this->fields['billingAddress'] = $billingAddress;

        return $this;
    }

    public function getRequestId(): ?string
    {
        return $this->fields['requestId'] ?? null;
    }

    public function setRequestId(null|string $requestId): static
    {
        $this->fields['requestId'] = $requestId;

        return $this;
    }

    public function getGatewayAccountId(): ?string
    {
        return $this->fields['gatewayAccountId'] ?? null;
    }

    public function setGatewayAccountId(null|string $gatewayAccountId): static
    {
        $this->fields['gatewayAccountId'] = $gatewayAccountId;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->fields['description'] ?? null;
    }

    public function setDescription(null|string $description): static
    {
        $this->fields['description'] = $description;

        return $this;
    }

    public function getNotificationUrl(): ?string
    {
        return $this->fields['notificationUrl'] ?? null;
    }

    public function setNotificationUrl(null|string $notificationUrl): static
    {
        $this->fields['notificationUrl'] = $notificationUrl;

        return $this;
    }

    public function getRedirectUrl(): ?string
    {
        return $this->fields['redirectUrl'] ?? null;
    }

    public function setRedirectUrl(null|string $redirectUrl): static
    {
        $this->fields['redirectUrl'] = $redirectUrl;

        return $this;
    }

    public function getCustomFields(): ?array
    {
        return $this->fields['customFields'] ?? null;
    }

    public function setCustomFields(null|array $customFields): static
    {
        $this->fields['customFields'] = $customFields;

        return $this;
    }

    public function getRiskMetadata(): ?RiskMetadata
    {
        return $this->fields['riskMetadata'] ?? null;
    }

    public function setRiskMetadata(null|RiskMetadata|array $riskMetadata): static
    {
        if ($riskMetadata !== null && !($riskMetadata instanceof RiskMetadata)) {
            $riskMetadata = RiskMetadata::from($riskMetadata);
        }

        $this->fields['riskMetadata'] = $riskMetadata;

        return $this;
    }

    public function getIsProcessedOutside(): ?bool
    {
        return $this->fields['isProcessedOutside'] ?? null;
    }

    public function setIsProcessedOutside(null|bool $isProcessedOutside): static
    {
        $this->fields['isProcessedOutside'] = $isProcessedOutside;

        return $this;
    }

    public function getIsMerchantInitiated(): ?bool
    {
        return $this->fields['isMerchantInitiated'] ?? null;
    }

    public function setIsMerchantInitiated(null|bool $isMerchantInitiated): static
    {
        $this->fields['isMerchantInitiated'] = $isMerchantInitiated;

        return $this;
    }

    public function getProcessedTime(): ?DateTimeImmutable
    {
        return $this->fields['processedTime'] ?? null;
    }

    public function setProcessedTime(null|DateTimeImmutable|string $processedTime): static
    {
        if ($processedTime !== null && !($processedTime instanceof DateTimeImmutable)) {
            $processedTime = new DateTimeImmutable($processedTime);
        }

        $this->fields['processedTime'] = $processedTime;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('upsertCustomer', $this->fields)) {
            $data['upsertCustomer'] = $this->fields['upsertCustomer'];
        }
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('limits', $this->fields)) {
            $data['limits'] = $this->fields['limits']?->jsonSerialize();
        }
        if (array_key_exists('websiteId', $this->fields)) {
            $data['websiteId'] = $this->fields['websiteId'];
        }
        if (array_key_exists('customerId', $this->fields)) {
            $data['customerId'] = $this->fields['customerId'];
        }
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }
        if (array_key_exists('amount', $this->fields)) {
            $data['amount'] = $this->fields['amount'];
        }
        if (array_key_exists('invoiceIds', $this->fields)) {
            $data['invoiceIds'] = $this->fields['invoiceIds'];
        }
        if (array_key_exists('paymentInstruction', $this->fields)) {
            $data['paymentInstruction'] = $this->fields['paymentInstruction']?->jsonSerialize();
        }
        if (array_key_exists('billingAddress', $this->fields)) {
            $data['billingAddress'] = $this->fields['billingAddress']?->jsonSerialize();
        }
        if (array_key_exists('requestId', $this->fields)) {
            $data['requestId'] = $this->fields['requestId'];
        }
        if (array_key_exists('gatewayAccountId', $this->fields)) {
            $data['gatewayAccountId'] = $this->fields['gatewayAccountId'];
        }
        if (array_key_exists('description', $this->fields)) {
            $data['description'] = $this->fields['description'];
        }
        if (array_key_exists('notificationUrl', $this->fields)) {
            $data['notificationUrl'] = $this->fields['notificationUrl'];
        }
        if (array_key_exists('redirectUrl', $this->fields)) {
            $data['redirectUrl'] = $this->fields['redirectUrl'];
        }
        if (array_key_exists('customFields', $this->fields)) {
            $data['customFields'] = $this->fields['customFields'];
        }
        if (array_key_exists('riskMetadata', $this->fields)) {
            $data['riskMetadata'] = $this->fields['riskMetadata']?->jsonSerialize();
        }
        if (array_key_exists('isProcessedOutside', $this->fields)) {
            $data['isProcessedOutside'] = $this->fields['isProcessedOutside'];
        }
        if (array_key_exists('isMerchantInitiated', $this->fields)) {
            $data['isMerchantInitiated'] = $this->fields['isMerchantInitiated'];
        }
        if (array_key_exists('processedTime', $this->fields)) {
            $data['processedTime'] = $this->fields['processedTime']?->format(DateTimeInterface::RFC3339);
        }

        return $data;
    }
}
