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

use InvalidArgumentException;
use JsonSerializable;

class ReadyToPayPaymentCardMethod implements JsonSerializable
{
    public const METHOD_PAYMENT_CARD = 'payment-card';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('method', $data)) {
            $this->setMethod($data['method']);
        }
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

    /**
     * @psalm-return self::METHOD_* $method
     */
    public function getMethod(): string
    {
        return $this->fields['method'];
    }

    /**
     * @psalm-param self::METHOD_* $method
     */
    public function setMethod(string $method): self
    {
        $this->fields['method'] = $method;

        return $this;
    }

    public function getFeature(): null|ApplePayFeature|GooglePayFeature
    {
        return $this->fields['feature'] ?? null;
    }

    public function setFeature(null|array|ApplePayFeature|GooglePayFeature $feature): self
    {
        $feature = $this->ensureFeature($feature);

        $this->fields['feature'] = $feature;

        return $this;
    }

    /**
     * @return null|\Rebilly\Sdk\Model\PaymentCardBrand[]
     */
    public function getBrands(): ?array
    {
        return $this->fields['brands'] ?? null;
    }

    /**
     * @param null|\Rebilly\Sdk\Model\PaymentCardBrand[] $brands
     */
    public function setBrands(null|array $brands): self
    {
        $brands = $brands !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof \Rebilly\Sdk\Model\PaymentCardBrand ? $value : \Rebilly\Sdk\Model\PaymentCardBrand::from($value)) : null, $brands) : null;

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
    public function setFilters(null|array $filters): self
    {
        $filters = $filters !== null ? array_map(fn ($value) => $value ?? null, $filters) : null;

        $this->fields['filters'] = $filters;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('method', $this->fields)) {
            $data['method'] = $this->fields['method'];
        }
        if (array_key_exists('feature', $this->fields)) {
            $data['feature'] = $this->fields['feature'];
        }
        if (array_key_exists('brands', $this->fields)) {
            $data['brands'] = $this->fields['brands'];
        }
        if (array_key_exists('filters', $this->fields)) {
            $data['filters'] = $this->fields['filters'];
        }

        return $data;
    }

    protected function ensureFeature(null|array|ApplePayFeature|GooglePayFeature $data): ApplePayFeature|GooglePayFeature
    {
        if (
            $data === null
            || $data instanceof \Rebilly\Sdk\Model\ApplePayFeature
            || $data instanceof \Rebilly\Sdk\Model\GooglePayFeature
        ) {
            return $data;
        }
        $candidates = [];
        $candidates[] = \Rebilly\Sdk\Model\ApplePayFeature::tryFrom($data);
        $candidates[] = \Rebilly\Sdk\Model\GooglePayFeature::tryFrom($data);

        $determined = array_reduce($candidates, function (?array $current, array $candidate) {
            if ($current === null || $current[1] < $candidate[1]) {
                $current = $candidate;
            }

            return $current;
        });

        if (
            $determined[0] === null
            || $determined[0] instanceof \Rebilly\Sdk\Model\ApplePayFeature
            || $determined[0] instanceof \Rebilly\Sdk\Model\GooglePayFeature
        ) {
            return $determined[0];
        }

        throw new InvalidArgumentException('Could not instantiate feature with the given value');
    }
}
