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

class AdyenSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('store', $data)) {
            $this->setStore($data['store']);
        }
        if (array_key_exists('url', $data)) {
            $this->setUrl($data['url']);
        }
        if (array_key_exists('splitPayments', $data)) {
            $this->setSplitPayments($data['splitPayments']);
        }
        if (array_key_exists('totalTaxAmount', $data)) {
            $this->setTotalTaxAmount($data['totalTaxAmount']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getStore(): ?string
    {
        return $this->fields['store'] ?? null;
    }

    public function setStore(null|string $store): static
    {
        $this->fields['store'] = $store;

        return $this;
    }

    public function getUrl(): string
    {
        return $this->fields['url'];
    }

    public function setUrl(string $url): static
    {
        $this->fields['url'] = $url;

        return $this;
    }

    /**
     * @return null|AdyenSettingsSplitPayments[]
     */
    public function getSplitPayments(): ?array
    {
        return $this->fields['splitPayments'] ?? null;
    }

    /**
     * @param null|AdyenSettingsSplitPayments[]|array[] $splitPayments
     */
    public function setSplitPayments(null|array $splitPayments): static
    {
        $splitPayments = $splitPayments !== null ? array_map(
            fn ($value) => $value !== null ? ($value instanceof AdyenSettingsSplitPayments ? $value : AdyenSettingsSplitPayments::from($value)) : null,
            $splitPayments,
        ) : null;

        $this->fields['splitPayments'] = $splitPayments;

        return $this;
    }

    public function getTotalTaxAmount(): ?float
    {
        return $this->fields['totalTaxAmount'] ?? null;
    }

    public function setTotalTaxAmount(null|float|string $totalTaxAmount): static
    {
        if (is_string($totalTaxAmount)) {
            $totalTaxAmount = (float) $totalTaxAmount;
        }

        $this->fields['totalTaxAmount'] = $totalTaxAmount;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('store', $this->fields)) {
            $data['store'] = $this->fields['store'];
        }
        if (array_key_exists('url', $this->fields)) {
            $data['url'] = $this->fields['url'];
        }
        if (array_key_exists('splitPayments', $this->fields)) {
            $data['splitPayments'] = $this->fields['splitPayments'];
        }
        if (array_key_exists('totalTaxAmount', $this->fields)) {
            $data['totalTaxAmount'] = $this->fields['totalTaxAmount'];
        }

        return $data;
    }
}
