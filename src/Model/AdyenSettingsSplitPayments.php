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

class AdyenSettingsSplitPayments implements JsonSerializable
{
    public const TYPE_BALANCE_ACCOUNT = 'BalanceAccount';

    public const TYPE_COMMISSION = 'Commission';

    public const TYPE_REMAINDER = 'Remainder';

    public const TYPE_PAYMENT_FEE = 'PaymentFee';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('percentage', $data)) {
            $this->setPercentage($data['percentage']);
        }
        if (array_key_exists('commissionAmount', $data)) {
            $this->setCommissionAmount($data['commissionAmount']);
        }
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
        }
        if (array_key_exists('account', $data)) {
            $this->setAccount($data['account']);
        }
        if (array_key_exists('merchantCountry', $data)) {
            $this->setMerchantCountry($data['merchantCountry']);
        }
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPercentage(): ?float
    {
        return $this->fields['percentage'] ?? null;
    }

    public function setPercentage(null|float|string $percentage): static
    {
        if (is_string($percentage)) {
            $percentage = (float) $percentage;
        }

        $this->fields['percentage'] = $percentage;

        return $this;
    }

    public function getCommissionAmount(): ?float
    {
        return $this->fields['commissionAmount'] ?? null;
    }

    public function setCommissionAmount(null|float|string $commissionAmount): static
    {
        if (is_string($commissionAmount)) {
            $commissionAmount = (float) $commissionAmount;
        }

        $this->fields['commissionAmount'] = $commissionAmount;

        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->fields['currency'] ?? null;
    }

    public function setCurrency(null|string $currency): static
    {
        $this->fields['currency'] = $currency;

        return $this;
    }

    public function getAccount(): ?string
    {
        return $this->fields['account'] ?? null;
    }

    public function setAccount(null|string $account): static
    {
        $this->fields['account'] = $account;

        return $this;
    }

    public function getMerchantCountry(): ?string
    {
        return $this->fields['merchantCountry'] ?? null;
    }

    public function setMerchantCountry(null|string $merchantCountry): static
    {
        $this->fields['merchantCountry'] = $merchantCountry;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->fields['type'] ?? null;
    }

    public function setType(null|string $type): static
    {
        $this->fields['type'] = $type;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('percentage', $this->fields)) {
            $data['percentage'] = $this->fields['percentage'];
        }
        if (array_key_exists('commissionAmount', $this->fields)) {
            $data['commissionAmount'] = $this->fields['commissionAmount'];
        }
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }
        if (array_key_exists('account', $this->fields)) {
            $data['account'] = $this->fields['account'];
        }
        if (array_key_exists('merchantCountry', $this->fields)) {
            $data['merchantCountry'] = $this->fields['merchantCountry'];
        }
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }

        return $data;
    }
}
