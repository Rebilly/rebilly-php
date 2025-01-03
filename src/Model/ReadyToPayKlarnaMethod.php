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

class ReadyToPayKlarnaMethod implements ReadyToPayMethods
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('feature', $data)) {
            $this->setFeature($data['feature']);
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
        return 'Klarna';
    }

    public function getFeature(): ?ReadyToPayKlarnaMethodFeature
    {
        return $this->fields['feature'] ?? null;
    }

    public function setFeature(null|ReadyToPayKlarnaMethodFeature|array $feature): static
    {
        if ($feature !== null && !($feature instanceof ReadyToPayKlarnaMethodFeature)) {
            $feature = ReadyToPayKlarnaMethodFeatureFactory::from($feature);
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
        $this->fields['filters'] = $filters;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'method' => 'Klarna',
        ];
        if (array_key_exists('feature', $this->fields)) {
            $data['feature'] = $this->fields['feature']?->jsonSerialize();
        }
        if (array_key_exists('filters', $this->fields)) {
            $data['filters'] = $this->fields['filters'];
        }

        return $data;
    }
}
