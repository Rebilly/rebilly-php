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

class ReadyToPayGenericMethod extends ReadyToPayMethods
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'method' => 'AdvCash',
        ] + $data);

        if (array_key_exists('method', $data)) {
            $this->setMethod($data['method']);
        }
        if (array_key_exists('filters', $data)) {
            $this->setFilters($data['filters']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMethod(): AlternativePaymentMethods
    {
        return $this->fields['method'];
    }

    public function setMethod(AlternativePaymentMethods|string $method): self
    {
        if (!($method instanceof AlternativePaymentMethods)) {
            $method = AlternativePaymentMethods::from($method);
        }

        $this->fields['method'] = $method;

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
            $data['method'] = $this->fields['method']?->value;
        }
        if (array_key_exists('filters', $this->fields)) {
            $data['filters'] = $this->fields['filters'];
        }

        return parent::jsonSerialize() + $data;
    }
}
