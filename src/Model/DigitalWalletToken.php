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
use InvalidArgumentException;

class DigitalWalletToken extends CompositeToken
{
    public const METHOD_DIGITAL_WALLET = 'digital-wallet';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'method' => 'digital-wallet',
        ] + $data);

        if (array_key_exists('method', $data)) {
            $this->setMethod($data['method']);
        }
        if (array_key_exists('paymentInstrument', $data)) {
            $this->setPaymentInstrument($data['paymentInstrument']);
        }
        if (array_key_exists('billingAddress', $data)) {
            $this->setBillingAddress($data['billingAddress']);
        }
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('isUsed', $data)) {
            $this->setIsUsed($data['isUsed']);
        }
        if (array_key_exists('riskMetadata', $data)) {
            $this->setRiskMetadata($data['riskMetadata']);
        }
        if (array_key_exists('leadSource', $data)) {
            $this->setLeadSource($data['leadSource']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
        if (array_key_exists('usageTime', $data)) {
            $this->setUsageTime($data['usageTime']);
        }
        if (array_key_exists('expirationTime', $data)) {
            $this->setExpirationTime($data['expirationTime']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @psalm-return self::METHOD_* $method
     */
    public function getMethod(): string
    {
        return $this->fields['method'];
    }

    /**
     * @psalm-param self::METHOD_* $method
     */
    public function setMethod(string $method): self
    {
        $this->fields['method'] = $method;

        return $this;
    }

    /**
     * @return array{type:string,amount:float,currency:string,descriptor:string,bin:string,last4:string,brand:PaymentCardBrand,expMonth:int,expYear:int,payload:object}
     */
    public function getPaymentInstrument(): array
    {
        return $this->fields['paymentInstrument'];
    }

    /**
     * @param array{type:string,amount:float,currency:string,descriptor:string,bin:string,last4:string,brand:PaymentCardBrand,expMonth:int,expYear:int,payload:object} $paymentInstrument
     */
    public function setPaymentInstrument(array $paymentInstrument): self
    {
        if (!isset($paymentInstrument['type'])) {
            throw new InvalidArgumentException('Property \'paymentInstrument.type\' must be set.');
        }
        if (!isset($paymentInstrument['amount'])) {
            throw new InvalidArgumentException('Property \'paymentInstrument.amount\' must be set.');
        }
        if (!isset($paymentInstrument['currency'])) {
            throw new InvalidArgumentException('Property \'paymentInstrument.currency\' must be set.');
        }
        if (!isset($paymentInstrument['descriptor'])) {
            throw new InvalidArgumentException('Property \'paymentInstrument.descriptor\' must be set.');
        }
        $paymentInstrument['bin'] = $paymentInstrument['bin'] ?? null;
        $paymentInstrument['last4'] = $paymentInstrument['last4'] ?? null;
        $paymentInstrument['brand'] = isset($paymentInstrument['brand']) ? ($paymentInstrument['brand'] instanceof PaymentCardBrand ? $paymentInstrument['brand'] : PaymentCardBrand::from($paymentInstrument['brand'])) : null;
        $paymentInstrument['expMonth'] = $paymentInstrument['expMonth'] ?? null;
        $paymentInstrument['expYear'] = $paymentInstrument['expYear'] ?? null;
        if (!isset($paymentInstrument['payload'])) {
            throw new InvalidArgumentException('Property \'paymentInstrument.payload\' must be set.');
        }

        $this->fields['paymentInstrument'] = $paymentInstrument;

        return $this;
    }

    public function getBillingAddress(): ?ContactObject
    {
        return $this->fields['billingAddress'] ?? null;
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function getIsUsed(): ?bool
    {
        return $this->fields['isUsed'] ?? null;
    }

    public function getRiskMetadata(): ?RiskMetadata
    {
        return $this->fields['riskMetadata'] ?? null;
    }

    public function setRiskMetadata(null|RiskMetadata|array $riskMetadata): self
    {
        if ($riskMetadata !== null && !($riskMetadata instanceof RiskMetadata)) {
            $riskMetadata = RiskMetadata::from($riskMetadata);
        }

        $this->fields['riskMetadata'] = $riskMetadata;

        return $this;
    }

    public function getLeadSource(): ?LeadSource
    {
        return $this->fields['leadSource'] ?? null;
    }

    public function setLeadSource(null|LeadSource|array $leadSource): self
    {
        if ($leadSource !== null && !($leadSource instanceof LeadSource)) {
            $leadSource = LeadSource::from($leadSource);
        }

        $this->fields['leadSource'] = $leadSource;

        return $this;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function setCreatedTime(null|DateTimeImmutable|string $createdTime): self
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

        return $this;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    public function getUsageTime(): ?DateTimeImmutable
    {
        return $this->fields['usageTime'] ?? null;
    }

    public function setUsageTime(null|DateTimeImmutable|string $usageTime): self
    {
        if ($usageTime !== null && !($usageTime instanceof DateTimeImmutable)) {
            $usageTime = new DateTimeImmutable($usageTime);
        }

        $this->fields['usageTime'] = $usageTime;

        return $this;
    }

    public function getExpirationTime(): ?DateTimeImmutable
    {
        return $this->fields['expirationTime'] ?? null;
    }

    public function setExpirationTime(null|DateTimeImmutable|string $expirationTime): self
    {
        if ($expirationTime !== null && !($expirationTime instanceof DateTimeImmutable)) {
            $expirationTime = new DateTimeImmutable($expirationTime);
        }

        $this->fields['expirationTime'] = $expirationTime;

        return $this;
    }

    /**
     * @return null|SelfLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('method', $this->fields)) {
            $data['method'] = $this->fields['method'];
        }
        if (array_key_exists('paymentInstrument', $this->fields)) {
            $data['paymentInstrument'] = $this->fields['paymentInstrument'];
        }
        if (array_key_exists('billingAddress', $this->fields)) {
            $data['billingAddress'] = $this->fields['billingAddress']?->jsonSerialize();
        }
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('isUsed', $this->fields)) {
            $data['isUsed'] = $this->fields['isUsed'];
        }
        if (array_key_exists('riskMetadata', $this->fields)) {
            $data['riskMetadata'] = $this->fields['riskMetadata']?->jsonSerialize();
        }
        if (array_key_exists('leadSource', $this->fields)) {
            $data['leadSource'] = $this->fields['leadSource']?->jsonSerialize();
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('usageTime', $this->fields)) {
            $data['usageTime'] = $this->fields['usageTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('expirationTime', $this->fields)) {
            $data['expirationTime'] = $this->fields['expirationTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }

        return parent::jsonSerialize() + $data;
    }

    private function setBillingAddress(null|ContactObject|array $billingAddress): self
    {
        if ($billingAddress !== null && !($billingAddress instanceof ContactObject)) {
            $billingAddress = ContactObject::from($billingAddress);
        }

        $this->fields['billingAddress'] = $billingAddress;

        return $this;
    }

    private function setId(null|string $id): self
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setIsUsed(null|bool $isUsed): self
    {
        $this->fields['isUsed'] = $isUsed;

        return $this;
    }

    private function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): self
    {
        if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

        return $this;
    }

    /**
     * @param null|SelfLink[] $links
     */
    private function setLinks(null|array $links): self
    {
        $links = $links !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof SelfLink ? $value : SelfLink::from($value)) : null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
