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

use JsonSerializable;

class RiskMetadataExtraData implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('kountFraudSessionId', $data)) {
            $this->setKountFraudSessionId($data['kountFraudSessionId']);
        }
        if (array_key_exists('payPalMerchantSessionId', $data)) {
            $this->setPayPalMerchantSessionId($data['payPalMerchantSessionId']);
        }
        if (array_key_exists('threatMetrixSessionId', $data)) {
            $this->setThreatMetrixSessionId($data['threatMetrixSessionId']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getKountFraudSessionId(): ?string
    {
        return $this->fields['kountFraudSessionId'] ?? null;
    }

    public function setKountFraudSessionId(null|string $kountFraudSessionId): static
    {
        $this->fields['kountFraudSessionId'] = $kountFraudSessionId;

        return $this;
    }

    public function getPayPalMerchantSessionId(): ?string
    {
        return $this->fields['payPalMerchantSessionId'] ?? null;
    }

    public function setPayPalMerchantSessionId(null|string $payPalMerchantSessionId): static
    {
        $this->fields['payPalMerchantSessionId'] = $payPalMerchantSessionId;

        return $this;
    }

    public function getThreatMetrixSessionId(): ?string
    {
        return $this->fields['threatMetrixSessionId'] ?? null;
    }

    public function setThreatMetrixSessionId(null|string $threatMetrixSessionId): static
    {
        $this->fields['threatMetrixSessionId'] = $threatMetrixSessionId;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('kountFraudSessionId', $this->fields)) {
            $data['kountFraudSessionId'] = $this->fields['kountFraudSessionId'];
        }
        if (array_key_exists('payPalMerchantSessionId', $this->fields)) {
            $data['payPalMerchantSessionId'] = $this->fields['payPalMerchantSessionId'];
        }
        if (array_key_exists('threatMetrixSessionId', $this->fields)) {
            $data['threatMetrixSessionId'] = $this->fields['threatMetrixSessionId'];
        }

        return $data;
    }
}
