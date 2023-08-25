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

class ParamountCommerceSettings implements JsonSerializable
{
    public const MERCHANT_TRANSACTION_TYPE_POKER = 'POKER';

    public const MERCHANT_TRANSACTION_TYPE_CASINO = 'CASINO';

    public const MERCHANT_TRANSACTION_TYPE_BINGO = 'BINGO';

    public const MERCHANT_TRANSACTION_TYPE_SPORTS_BETTING = 'SPORTS_BETTING';

    public const MERCHANT_TRANSACTION_TYPE_DIGITAL_REMITTANCE = 'DIGITAL_REMITTANCE';

    public const MERCHANT_TRANSACTION_TYPE_E_SPORTS = 'E_SPORTS';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('merchantSubId', $data)) {
            $this->setMerchantSubId($data['merchantSubId']);
        }
        if (array_key_exists('merchantTransactionType', $data)) {
            $this->setMerchantTransactionType($data['merchantTransactionType']);
        }
        if (array_key_exists('useDirectDeposit', $data)) {
            $this->setUseDirectDeposit($data['useDirectDeposit']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMerchantSubId(): string
    {
        return $this->fields['merchantSubId'];
    }

    public function setMerchantSubId(string $merchantSubId): static
    {
        $this->fields['merchantSubId'] = $merchantSubId;

        return $this;
    }

    public function getMerchantTransactionType(): string
    {
        return $this->fields['merchantTransactionType'];
    }

    public function setMerchantTransactionType(string $merchantTransactionType): static
    {
        $this->fields['merchantTransactionType'] = $merchantTransactionType;

        return $this;
    }

    public function getUseDirectDeposit(): ?bool
    {
        return $this->fields['useDirectDeposit'] ?? null;
    }

    public function setUseDirectDeposit(null|bool $useDirectDeposit): static
    {
        $this->fields['useDirectDeposit'] = $useDirectDeposit;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('merchantSubId', $this->fields)) {
            $data['merchantSubId'] = $this->fields['merchantSubId'];
        }
        if (array_key_exists('merchantTransactionType', $this->fields)) {
            $data['merchantTransactionType'] = $this->fields['merchantTransactionType'];
        }
        if (array_key_exists('useDirectDeposit', $this->fields)) {
            $data['useDirectDeposit'] = $this->fields['useDirectDeposit'];
        }

        return $data;
    }
}
