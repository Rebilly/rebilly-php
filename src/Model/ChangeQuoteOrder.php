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

class ChangeQuoteOrder implements JsonSerializable
{
    public const RENEWAL_POLICY_RESET = 'reset';

    public const RENEWAL_POLICY_RETAIN = 'retain';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
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
        if (array_key_exists('keepTrial', $data)) {
            $this->setKeepTrial($data['keepTrial']);
        }
        if (array_key_exists('interimOnly', $data)) {
            $this->setInterimOnly($data['interimOnly']);
        }
        if (array_key_exists('usageSettings', $data)) {
            $this->setUsageSettings($data['usageSettings']);
        }
        if (array_key_exists('autopay', $data)) {
            $this->setAutopay($data['autopay']);
        }
        if (array_key_exists('shipping', $data)) {
            $this->setShipping($data['shipping']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getId(): string
    {
        return $this->fields['id'];
    }

    public function setId(string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    /**
     * @return QuoteItem[]
     */
    public function getItems(): array
    {
        return $this->fields['items'];
    }

    /**
     * @param array[]|QuoteItem[] $items
     */
    public function setItems(array $items): static
    {
        $items = array_map(
            fn ($value) => $value instanceof QuoteItem ? $value : QuoteItemFactory::from($value),
            $items,
        );

        $this->fields['items'] = $items;

        return $this;
    }

    public function getRenewalPolicy(): ?string
    {
        return $this->fields['renewalPolicy'] ?? null;
    }

    public function setRenewalPolicy(null|string $renewalPolicy): static
    {
        $this->fields['renewalPolicy'] = $renewalPolicy;

        return $this;
    }

    public function getProrated(): ?bool
    {
        return $this->fields['prorated'] ?? null;
    }

    public function setProrated(null|bool $prorated): static
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

    public function getKeepTrial(): ?bool
    {
        return $this->fields['keepTrial'] ?? null;
    }

    public function setKeepTrial(null|bool $keepTrial): static
    {
        $this->fields['keepTrial'] = $keepTrial;

        return $this;
    }

    public function getInterimOnly(): ?bool
    {
        return $this->fields['interimOnly'] ?? null;
    }

    public function setInterimOnly(null|bool $interimOnly): static
    {
        $this->fields['interimOnly'] = $interimOnly;

        return $this;
    }

    /**
     * @return null|ChangeQuoteOrderUsageSettings[]
     */
    public function getUsageSettings(): ?array
    {
        return $this->fields['usageSettings'] ?? null;
    }

    /**
     * @param null|array[]|ChangeQuoteOrderUsageSettings[] $usageSettings
     */
    public function setUsageSettings(null|array $usageSettings): static
    {
        $usageSettings = $usageSettings !== null ? array_map(
            fn ($value) => $value instanceof ChangeQuoteOrderUsageSettings ? $value : ChangeQuoteOrderUsageSettings::from($value),
            $usageSettings,
        ) : null;

        $this->fields['usageSettings'] = $usageSettings;

        return $this;
    }

    public function getAutopay(): ?bool
    {
        return $this->fields['autopay'] ?? null;
    }

    public function setAutopay(null|bool $autopay): static
    {
        $this->fields['autopay'] = $autopay;

        return $this;
    }

    public function getShipping(): ?Shipping
    {
        return $this->fields['shipping'] ?? null;
    }

    public function setShipping(null|Shipping|array $shipping): static
    {
        if ($shipping !== null && !($shipping instanceof Shipping)) {
            $shipping = ShippingFactory::from($shipping);
        }

        $this->fields['shipping'] = $shipping;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('items', $this->fields)) {
            $data['items'] = array_map(
                static fn (QuoteItem $quoteItem) => $quoteItem->jsonSerialize(),
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
        if (array_key_exists('keepTrial', $this->fields)) {
            $data['keepTrial'] = $this->fields['keepTrial'];
        }
        if (array_key_exists('interimOnly', $this->fields)) {
            $data['interimOnly'] = $this->fields['interimOnly'];
        }
        if (array_key_exists('usageSettings', $this->fields)) {
            $data['usageSettings'] = $this->fields['usageSettings'] !== null
                ? array_map(
                    static fn (ChangeQuoteOrderUsageSettings $changeQuoteOrderUsageSettings) => $changeQuoteOrderUsageSettings->jsonSerialize(),
                    $this->fields['usageSettings'],
                )
                : null;
        }
        if (array_key_exists('autopay', $this->fields)) {
            $data['autopay'] = $this->fields['autopay'];
        }
        if (array_key_exists('shipping', $this->fields)) {
            $data['shipping'] = $this->fields['shipping']?->jsonSerialize();
        }

        return $data;
    }
}
