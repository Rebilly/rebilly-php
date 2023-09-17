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

class ReadyToPayPaymentCardMethod implements ReadyToPayMethods, JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('feature', $data)) {
            $this->setFeature($data['feature']);
        }
        if (array_key_exists('brands', $data)) {
            $this->setBrands($data['brands']);
        }
        if (array_key_exists('filters', $data)) {
            $this->setFilters($data['filters']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMethod(): string
    {
        return 'payment-card';
    }

    public function getFeature(): ?PaymentCardFeature
    {
        return $this->fields['feature'] ?? null;
    }

    public function setFeature(null|PaymentCardFeature|array $feature): static
    {
        if ($feature !== null && !($feature instanceof PaymentCardFeature)) {
            $feature = PaymentCardFeatureFactory::from($feature);
        }

        $this->fields['feature'] = $feature;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getBrands(): ?array
    {
        return $this->fields['brands'] ?? null;
    }

    /**
     * @param null|string[] $brands
     */
    public function setBrands(null|array $brands): static
    {
        $brands = $brands !== null ? array_map(
            fn ($value) => $value,
            $brands,
        ) : null;

        $this->fields['brands'] = $brands;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getFilters(): ?array
    {
        return $this->fields['filters'] ?? null;
    }

    /**
     * @param null|string[] $filters
     */
    public function setFilters(null|array $filters): static
    {
        $filters = $filters !== null ? array_map(
            fn ($value) => $value,
            $filters,
        ) : null;

        $this->fields['filters'] = $filters;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'method' => 'payment-card',
        ];
        if (array_key_exists('feature', $this->fields)) {
            $data['feature'] = $this->fields['feature']?->jsonSerialize();
        }
        if (array_key_exists('brands', $this->fields)) {
            $data['brands'] = $this->fields['brands'];
        }
        if (array_key_exists('filters', $this->fields)) {
            $data['filters'] = $this->fields['filters'];
        }

        return $data;
    }
}
