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

class QuoteReactivateOrderItemsUsageLimits implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('softLimit', $data)) {
            $this->setSoftLimit($data['softLimit']);
        }
        if (array_key_exists('hardLimit', $data)) {
            $this->setHardLimit($data['hardLimit']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getSoftLimit(): ?QuoteReactivateOrderItemsUsageLimitsSoftLimit
    {
        return $this->fields['softLimit'] ?? null;
    }

    public function setSoftLimit(null|QuoteReactivateOrderItemsUsageLimitsSoftLimit|array $softLimit): static
    {
        if ($softLimit !== null && !($softLimit instanceof QuoteReactivateOrderItemsUsageLimitsSoftLimit)) {
            $softLimit = QuoteReactivateOrderItemsUsageLimitsSoftLimit::from($softLimit);
        }

        $this->fields['softLimit'] = $softLimit;

        return $this;
    }

    public function getHardLimit(): ?QuoteReactivateOrderItemsUsageLimitsHardLimit
    {
        return $this->fields['hardLimit'] ?? null;
    }

    public function setHardLimit(null|QuoteReactivateOrderItemsUsageLimitsHardLimit|array $hardLimit): static
    {
        if ($hardLimit !== null && !($hardLimit instanceof QuoteReactivateOrderItemsUsageLimitsHardLimit)) {
            $hardLimit = QuoteReactivateOrderItemsUsageLimitsHardLimit::from($hardLimit);
        }

        $this->fields['hardLimit'] = $hardLimit;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('softLimit', $this->fields)) {
            $data['softLimit'] = $this->fields['softLimit']?->jsonSerialize();
        }
        if (array_key_exists('hardLimit', $this->fields)) {
            $data['hardLimit'] = $this->fields['hardLimit']?->jsonSerialize();
        }

        return $data;
    }
}
