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

use DateTimeImmutable;
use DateTimeInterface;
use JsonSerializable;

class QuoteChangeOrderItems implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('quantity', $data)) {
            $this->setQuantity($data['quantity']);
        }
        if (array_key_exists('plan', $data)) {
            $this->setPlan($data['plan']);
        }
        if (array_key_exists('description', $data)) {
            $this->setDescription($data['description']);
        }
        if (array_key_exists('priceDescription', $data)) {
            $this->setPriceDescription($data['priceDescription']);
        }
        if (array_key_exists('usageLimits', $data)) {
            $this->setUsageLimits($data['usageLimits']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
        if (array_key_exists('_embedded', $data)) {
            $this->setEmbedded($data['_embedded']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function getQuantity(): int
    {
        return $this->fields['quantity'];
    }

    public function setQuantity(int $quantity): static
    {
        $this->fields['quantity'] = $quantity;

        return $this;
    }

    public function getPlan(): ConfigurablePlan
    {
        return $this->fields['plan'];
    }

    public function setPlan(ConfigurablePlan|array $plan): static
    {
        if (!($plan instanceof ConfigurablePlan)) {
            $plan = ConfigurablePlanFactory::from($plan);
        }

        $this->fields['plan'] = $plan;

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

    public function getPriceDescription(): ?string
    {
        return $this->fields['priceDescription'] ?? null;
    }

    public function setPriceDescription(null|string $priceDescription): static
    {
        $this->fields['priceDescription'] = $priceDescription;

        return $this;
    }

    public function getUsageLimits(): ?QuoteChangeOrderItemsUsageLimits
    {
        return $this->fields['usageLimits'] ?? null;
    }

    public function setUsageLimits(null|QuoteChangeOrderItemsUsageLimits|array $usageLimits): static
    {
        if ($usageLimits !== null && !($usageLimits instanceof QuoteChangeOrderItemsUsageLimits)) {
            $usageLimits = QuoteChangeOrderItemsUsageLimits::from($usageLimits);
        }

        $this->fields['usageLimits'] = $usageLimits;

        return $this;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    public function getEmbedded(): ?QuoteChangeOrderItemsEmbedded
    {
        return $this->fields['_embedded'] ?? null;
    }

    public function setEmbedded(null|QuoteChangeOrderItemsEmbedded|array $embedded): static
    {
        if ($embedded !== null && !($embedded instanceof QuoteChangeOrderItemsEmbedded)) {
            $embedded = QuoteChangeOrderItemsEmbedded::from($embedded);
        }

        $this->fields['_embedded'] = $embedded;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('quantity', $this->fields)) {
            $data['quantity'] = $this->fields['quantity'];
        }
        if (array_key_exists('plan', $this->fields)) {
            $data['plan'] = $this->fields['plan']->jsonSerialize();
        }
        if (array_key_exists('description', $this->fields)) {
            $data['description'] = $this->fields['description'];
        }
        if (array_key_exists('priceDescription', $this->fields)) {
            $data['priceDescription'] = $this->fields['priceDescription'];
        }
        if (array_key_exists('usageLimits', $this->fields)) {
            $data['usageLimits'] = $this->fields['usageLimits']?->jsonSerialize();
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('_embedded', $this->fields)) {
            $data['_embedded'] = $this->fields['_embedded']?->jsonSerialize();
        }

        return $data;
    }

    private function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setCreatedTime(null|DateTimeImmutable|string $createdTime): static
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

        return $this;
    }

    private function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): static
    {
        if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

        return $this;
    }
}
