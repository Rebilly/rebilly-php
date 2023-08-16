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

class RebillyShipping extends Shipping
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'calculator' => 'rebilly',
        ] + $data);

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

    public function getRateId(): ?string
    {
        return $this->fields['rateId'] ?? null;
    }

    public function setRateId(null|string $rateId): static
    {
        $this->fields['rateId'] = $rateId;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->fields['amount'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('rateId', $this->fields)) {
            $data['rateId'] = $this->fields['rateId'];
        }
        if (array_key_exists('amount', $this->fields)) {
            $data['amount'] = $this->fields['amount'];
        }

        return parent::jsonSerialize() + $data;
    }

    private function setAmount(null|int $amount): static
    {
        $this->fields['amount'] = $amount;

        return $this;
    }
}
