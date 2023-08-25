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

class ReadyToPayPayPalMethod implements ReadyToPayMethods, JsonSerializable
{
    public const METHOD_PAYPAL = 'paypal';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('method', $data)) {
            $this->setMethod($data['method']);
        }
        if (array_key_exists('feature', $data)) {
            $this->setFeature($data['feature']);
        }
        if (array_key_exists('filters', $data)) {
            $this->setFilters($data['filters']);
        }
        if (array_key_exists('brands', $data)) {
            $this->setBrands($data['brands']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMethod(): string
    {
        return $this->fields['method'];
    }

    public function setMethod(string $method): static
    {
        $this->fields['method'] = $method;

        return $this;
    }

    public function getFeature(): ?ReadyToPayPayPalMethodFeature
    {
        return $this->fields['feature'] ?? null;
    }

    public function setFeature(null|ReadyToPayPayPalMethodFeature|array $feature): static
    {
        if ($feature !== null && !($feature instanceof ReadyToPayPayPalMethodFeature)) {
            $feature = ReadyToPayPayPalMethodFeatureFactory::from($feature);
        }

        $this->fields['feature'] = $feature;

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

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('method', $this->fields)) {
            $data['method'] = $this->fields['method'];
        }
        if (array_key_exists('feature', $this->fields)) {
            $data['feature'] = $this->fields['feature']?->jsonSerialize();
        }
        if (array_key_exists('filters', $this->fields)) {
            $data['filters'] = $this->fields['filters'];
        }
        if (array_key_exists('brands', $this->fields)) {
            $data['brands'] = $this->fields['brands'];
        }

        return $data;
    }
}
