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

class RebillyShipping implements Shipping
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('rateId', $data)) {
            $this->setRateId($data['rateId']);
        }
        if (array_key_exists('amount', $data)) {
            $this->setAmount($data['amount']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCalculator(): string
    {
        return 'rebilly';
    }

    public function getRateId(): ?string
    {
        return $this->fields['rateId'] ?? null;
    }

    public function setRateId(null|string $rateId): static
    {
        $this->fields['rateId'] = $rateId;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->fields['amount'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'calculator' => 'rebilly',
        ];
        if (array_key_exists('rateId', $this->fields)) {
            $data['rateId'] = $this->fields['rateId'];
        }
        if (array_key_exists('amount', $this->fields)) {
            $data['amount'] = $this->fields['amount'];
        }

        return $data;
    }

    private function setAmount(null|float|string $amount): static
    {
        if (is_string($amount)) {
            $amount = (float) $amount;
        }

        $this->fields['amount'] = $amount;

        return $this;
    }
}
