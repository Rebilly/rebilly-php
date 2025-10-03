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

class OrderChange implements JsonSerializable
{
    public const RENEWAL_POLICY_RESET = 'reset';

    public const RENEWAL_POLICY_RETAIN = 'retain';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('items', $data)) {
            $this->setItems($data['items']);
        }
        if (array_key_exists('renewalPolicy', $data)) {
            $this->setRenewalPolicy($data['renewalPolicy']);
        }
        if (array_key_exists('prorated', $data)) {
            $this->setProrated($data['prorated']);
        }
        if (array_key_exists('effectiveTime', $data)) {
            $this->setEffectiveTime($data['effectiveTime']);
        }
        if (array_key_exists('preview', $data)) {
            $this->setPreview($data['preview']);
        }
        if (array_key_exists('keepTrial', $data)) {
            $this->setKeepTrial($data['keepTrial']);
        }
        if (array_key_exists('ignoreRecurring', $data)) {
            $this->setIgnoreRecurring($data['ignoreRecurring']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return OrderChangeItems[]
     */
    public function getItems(): array
    {
        return $this->fields['items'];
    }

    /**
     * @param array[]|OrderChangeItems[] $items
     */
    public function setItems(array $items): static
    {
        $items = array_map(
            fn ($value) => $value instanceof OrderChangeItems ? $value : OrderChangeItems::from($value),
            $items,
        );

        $this->fields['items'] = $items;

        return $this;
    }

    public function getRenewalPolicy(): string
    {
        return $this->fields['renewalPolicy'];
    }

    public function setRenewalPolicy(string $renewalPolicy): static
    {
        $this->fields['renewalPolicy'] = $renewalPolicy;

        return $this;
    }

    public function getProrated(): bool
    {
        return $this->fields['prorated'];
    }

    public function setProrated(bool $prorated): static
    {
        $this->fields['prorated'] = $prorated;

        return $this;
    }

    public function getEffectiveTime(): ?DateTimeImmutable
    {
        return $this->fields['effectiveTime'] ?? null;
    }

    public function setEffectiveTime(null|DateTimeImmutable|string $effectiveTime): static
    {
        if ($effectiveTime !== null && !($effectiveTime instanceof DateTimeImmutable)) {
            $effectiveTime = new DateTimeImmutable($effectiveTime);
        }

        $this->fields['effectiveTime'] = $effectiveTime;

        return $this;
    }

    public function getPreview(): ?bool
    {
        return $this->fields['preview'] ?? null;
    }

    public function setPreview(null|bool $preview): static
    {
        $this->fields['preview'] = $preview;

        return $this;
    }

    public function getKeepTrial(): ?bool
    {
        return $this->fields['keepTrial'] ?? null;
    }

    public function setKeepTrial(null|bool $keepTrial): static
    {
        $this->fields['keepTrial'] = $keepTrial;

        return $this;
    }

    public function getIgnoreRecurring(): ?bool
    {
        return $this->fields['ignoreRecurring'] ?? null;
    }

    public function setIgnoreRecurring(null|bool $ignoreRecurring): static
    {
        $this->fields['ignoreRecurring'] = $ignoreRecurring;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('items', $this->fields)) {
            $data['items'] = array_map(
                static fn (OrderChangeItems $orderChangeItems) => $orderChangeItems->jsonSerialize(),
                $this->fields['items'],
            );
        }
        if (array_key_exists('renewalPolicy', $this->fields)) {
            $data['renewalPolicy'] = $this->fields['renewalPolicy'];
        }
        if (array_key_exists('prorated', $this->fields)) {
            $data['prorated'] = $this->fields['prorated'];
        }
        if (array_key_exists('effectiveTime', $this->fields)) {
            $data['effectiveTime'] = $this->fields['effectiveTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('preview', $this->fields)) {
            $data['preview'] = $this->fields['preview'];
        }
        if (array_key_exists('keepTrial', $this->fields)) {
            $data['keepTrial'] = $this->fields['keepTrial'];
        }
        if (array_key_exists('ignoreRecurring', $this->fields)) {
            $data['ignoreRecurring'] = $this->fields['ignoreRecurring'];
        }

        return $data;
    }
}
