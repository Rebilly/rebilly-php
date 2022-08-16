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

class TransactionUpdate implements JsonSerializable
{
    public const RESULT_ABANDONED = 'abandoned';

    public const RESULT_APPROVED = 'approved';

    public const RESULT_CANCELED = 'canceled';

    public const RESULT_DECLINED = 'declined';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('result', $data)) {
            $this->setResult($data['result']);
        }
        if (array_key_exists('amount', $data)) {
            $this->setAmount($data['amount']);
        }
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @psalm-return self::RESULT_* $result
     */
    public function getResult(): string
    {
        return $this->fields['result'];
    }

    /**
     * @psalm-param self::RESULT_* $result
     */
    public function setResult(string $result): self
    {
        $this->fields['result'] = $result;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->fields['amount'] ?? null;
    }

    public function setAmount(null|float|string $amount): self
    {
        if (is_string($amount)) {
            $amount = (float) $amount;
        }

        $this->fields['amount'] = $amount;

        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->fields['currency'] ?? null;
    }

    public function setCurrency(null|string $currency): self
    {
        $this->fields['currency'] = $currency;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('result', $this->fields)) {
            $data['result'] = $this->fields['result'];
        }
        if (array_key_exists('amount', $this->fields)) {
            $data['amount'] = $this->fields['amount'];
        }
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }

        return $data;
    }
}
