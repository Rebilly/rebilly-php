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
        if (array_key_exists('totalTaxRate', $data)) {
            $this->setTotalTaxRate($data['totalTaxRate']);
        }
        if (array_key_exists('enableMoto', $data)) {
            $this->setEnableMoto($data['enableMoto']);
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
            fn ($value) => $value instanceof AdyenSettingsSplitPayments ? $value : AdyenSettingsSplitPayments::from($value),
            $splitPayments,
        ) : null;

        $this->fields['splitPayments'] = $splitPayments;

        return $this;
    }

    public function getTotalTaxRate(): ?float
    {
        return $this->fields['totalTaxRate'] ?? null;
    }

    public function setTotalTaxRate(null|float|string $totalTaxRate): static
    {
        if (is_string($totalTaxRate)) {
            $totalTaxRate = (float) $totalTaxRate;
        }

        $this->fields['totalTaxRate'] = $totalTaxRate;

        return $this;
    }

    public function getEnableMoto(): ?bool
    {
        return $this->fields['enableMoto'] ?? null;
    }

    public function setEnableMoto(null|bool $enableMoto): static
    {
        $this->fields['enableMoto'] = $enableMoto;

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
            $data['splitPayments'] = $this->fields['splitPayments'] !== null
                ? array_map(
                    static fn (AdyenSettingsSplitPayments $adyenSettingsSplitPayments) => $adyenSettingsSplitPayments->jsonSerialize(),
                    $this->fields['splitPayments'],
                )
                : null;
        }
        if (array_key_exists('totalTaxRate', $this->fields)) {
            $data['totalTaxRate'] = $this->fields['totalTaxRate'];
        }
        if (array_key_exists('enableMoto', $this->fields)) {
            $data['enableMoto'] = $this->fields['enableMoto'];
        }

        return $data;
    }
}
