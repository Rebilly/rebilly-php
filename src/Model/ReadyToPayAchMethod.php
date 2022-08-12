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

class ReadyToPayAchMethod implements JsonSerializable
{
    public const METHOD_ACH = 'ach';

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

    public function getFeature(): ?AchPlaidFeature
    {
        return $this->fields['feature'] ?? null;
    }

    public function setFeature(null|AchPlaidFeature|array $feature): self
    {
        if ($feature !== null && !($feature instanceof \Rebilly\Sdk\Model\AchPlaidFeature)) {
            $feature = \Rebilly\Sdk\Model\AchPlaidFeature::from($feature);
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
            $data['feature'] = $this->fields['feature']?->jsonSerialize();
        }
        if (array_key_exists('filters', $this->fields)) {
            $data['filters'] = $this->fields['filters'];
        }

        return $data;
    }
}
