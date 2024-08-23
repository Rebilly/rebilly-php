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

class OrganizationSettingsBilling implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('pendingOrderTtl', $data)) {
            $this->setPendingOrderTtl($data['pendingOrderTtl']);
        }
        if (array_key_exists('orderDelinquencyPeriod', $data)) {
            $this->setOrderDelinquencyPeriod($data['orderDelinquencyPeriod']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPendingOrderTtl(): ?string
    {
        return $this->fields['pendingOrderTtl'] ?? null;
    }

    public function setPendingOrderTtl(null|string $pendingOrderTtl): static
    {
        $this->fields['pendingOrderTtl'] = $pendingOrderTtl;

        return $this;
    }

    public function getOrderDelinquencyPeriod(): ?string
    {
        return $this->fields['orderDelinquencyPeriod'] ?? null;
    }

    public function setOrderDelinquencyPeriod(null|string $orderDelinquencyPeriod): static
    {
        $this->fields['orderDelinquencyPeriod'] = $orderDelinquencyPeriod;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('pendingOrderTtl', $this->fields)) {
            $data['pendingOrderTtl'] = $this->fields['pendingOrderTtl'];
        }
        if (array_key_exists('orderDelinquencyPeriod', $this->fields)) {
            $data['orderDelinquencyPeriod'] = $this->fields['orderDelinquencyPeriod'];
        }

        return $data;
    }
}
