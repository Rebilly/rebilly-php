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

class OrganizationQuestionnaire implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('role', $data)) {
            $this->setRole($data['role']);
        }
        if (array_key_exists('monthlyTransactions', $data)) {
            $this->setMonthlyTransactions($data['monthlyTransactions']);
        }
        if (array_key_exists('products', $data)) {
            $this->setProducts($data['products']);
        }
        if (array_key_exists('integrationType', $data)) {
            $this->setIntegrationType($data['integrationType']);
        }
        if (array_key_exists('launchTiming', $data)) {
            $this->setLaunchTiming($data['launchTiming']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getRole(): ?string
    {
        return $this->fields['role'] ?? null;
    }

    public function setRole(null|string $role): static
    {
        $this->fields['role'] = $role;

        return $this;
    }

    public function getMonthlyTransactions(): ?string
    {
        return $this->fields['monthlyTransactions'] ?? null;
    }

    public function setMonthlyTransactions(null|string $monthlyTransactions): static
    {
        $this->fields['monthlyTransactions'] = $monthlyTransactions;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getProducts(): ?array
    {
        return $this->fields['products'] ?? null;
    }

    /**
     * @param null|string[] $products
     */
    public function setProducts(null|array $products): static
    {
        $this->fields['products'] = $products;

        return $this;
    }

    public function getIntegrationType(): ?string
    {
        return $this->fields['integrationType'] ?? null;
    }

    public function setIntegrationType(null|string $integrationType): static
    {
        $this->fields['integrationType'] = $integrationType;

        return $this;
    }

    public function getLaunchTiming(): ?string
    {
        return $this->fields['launchTiming'] ?? null;
    }

    public function setLaunchTiming(null|string $launchTiming): static
    {
        $this->fields['launchTiming'] = $launchTiming;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('role', $this->fields)) {
            $data['role'] = $this->fields['role'];
        }
        if (array_key_exists('monthlyTransactions', $this->fields)) {
            $data['monthlyTransactions'] = $this->fields['monthlyTransactions'];
        }
        if (array_key_exists('products', $this->fields)) {
            $data['products'] = $this->fields['products'];
        }
        if (array_key_exists('integrationType', $this->fields)) {
            $data['integrationType'] = $this->fields['integrationType'];
        }
        if (array_key_exists('launchTiming', $this->fields)) {
            $data['launchTiming'] = $this->fields['launchTiming'];
        }

        return $data;
    }
}
