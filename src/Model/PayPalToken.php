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

class PayPalToken implements CompositeToken, JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
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

    public function getMethod(): string
    {
        return 'paypal';
    }

    public function getPaymentInstrument(): PayPalTokenPaymentInstrument
    {
        return $this->fields['paymentInstrument'];
    }

    public function setPaymentInstrument(PayPalTokenPaymentInstrument|array $paymentInstrument): static
    {
        if (!($paymentInstrument instanceof PayPalTokenPaymentInstrument)) {
            $paymentInstrument = PayPalTokenPaymentInstrument::from($paymentInstrument);
        }

        $this->fields['paymentInstrument'] = $paymentInstrument;

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

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    public function getIsUsed(): ?bool
    {
        return $this->fields['isUsed'] ?? null;
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

    public function getLeadSource(): ?LeadSource
    {
        return $this->fields['leadSource'] ?? null;
    }

    public function setLeadSource(null|LeadSource|array $leadSource): static
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

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    public function getUsageTime(): ?DateTimeImmutable
    {
        return $this->fields['usageTime'] ?? null;
    }

    public function getExpirationTime(): ?DateTimeImmutable
    {
        return $this->fields['expirationTime'] ?? null;
    }

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    /**
     * @param null|array[]|ResourceLink[] $links
     */
    public function setLinks(null|array $links): static
    {
        $this->fields['_links'] = $links;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'method' => 'paypal',
        ];
        if (array_key_exists('paymentInstrument', $this->fields)) {
            $data['paymentInstrument'] = $this->fields['paymentInstrument']?->jsonSerialize();
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

        return $data;
    }

    private function setIsUsed(null|bool $isUsed): static
    {
        $this->fields['isUsed'] = $isUsed;

        return $this;
    }

    private function setCreatedTime(null|DateTimeImmutable|string $createdTime): static
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

        return $this;
    }

    private function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): static
    {
        if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

        return $this;
    }

    private function setUsageTime(null|DateTimeImmutable|string $usageTime): static
    {
        if ($usageTime !== null && !($usageTime instanceof DateTimeImmutable)) {
            $usageTime = new DateTimeImmutable($usageTime);
        }

        $this->fields['usageTime'] = $usageTime;

        return $this;
    }

    private function setExpirationTime(null|DateTimeImmutable|string $expirationTime): static
    {
        if ($expirationTime !== null && !($expirationTime instanceof DateTimeImmutable)) {
            $expirationTime = new DateTimeImmutable($expirationTime);
        }

        $this->fields['expirationTime'] = $expirationTime;

        return $this;
    }
}
