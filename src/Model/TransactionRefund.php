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

class TransactionRefund implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('amount', $data)) {
            $this->setAmount($data['amount']);
        }
        if (array_key_exists('description', $data)) {
            $this->setDescription($data['description']);
        }
        if (array_key_exists('isProcessedOutside', $data)) {
            $this->setIsProcessedOutside($data['isProcessedOutside']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
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

    public function getDescription(): ?string
    {
        return $this->fields['description'] ?? null;
    }

    public function setDescription(null|string $description): static
    {
        $this->fields['description'] = $description;

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

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('amount', $this->fields)) {
            $data['amount'] = $this->fields['amount'];
        }
        if (array_key_exists('description', $this->fields)) {
            $data['description'] = $this->fields['description'];
        }
        if (array_key_exists('isProcessedOutside', $this->fields)) {
            $data['isProcessedOutside'] = $this->fields['isProcessedOutside'];
        }

        return $data;
    }
}
