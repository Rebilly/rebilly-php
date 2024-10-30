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

class MonoloSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('payoutCurrency', $data)) {
            $this->setPayoutCurrency($data['payoutCurrency']);
        }
        if (array_key_exists('payoutNetwork', $data)) {
            $this->setPayoutNetwork($data['payoutNetwork']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPayoutCurrency(): ?string
    {
        return $this->fields['payoutCurrency'] ?? null;
    }

    public function setPayoutCurrency(null|string $payoutCurrency): static
    {
        $this->fields['payoutCurrency'] = $payoutCurrency;

        return $this;
    }

    public function getPayoutNetwork(): ?string
    {
        return $this->fields['payoutNetwork'] ?? null;
    }

    public function setPayoutNetwork(null|string $payoutNetwork): static
    {
        $this->fields['payoutNetwork'] = $payoutNetwork;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('payoutCurrency', $this->fields)) {
            $data['payoutCurrency'] = $this->fields['payoutCurrency'];
        }
        if (array_key_exists('payoutNetwork', $this->fields)) {
            $data['payoutNetwork'] = $this->fields['payoutNetwork'];
        }

        return $data;
    }
}
