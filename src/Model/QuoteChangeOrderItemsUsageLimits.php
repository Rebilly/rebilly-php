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

class QuoteChangeOrderItemsUsageLimits implements JsonSerializable
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

    public function getSoftLimit(): ?QuoteChangeOrderItemsUsageLimitsSoftLimit
    {
        return $this->fields['softLimit'] ?? null;
    }

    public function setSoftLimit(null|QuoteChangeOrderItemsUsageLimitsSoftLimit|array $softLimit): static
    {
        if ($softLimit !== null && !($softLimit instanceof QuoteChangeOrderItemsUsageLimitsSoftLimit)) {
            $softLimit = QuoteChangeOrderItemsUsageLimitsSoftLimit::from($softLimit);
        }

        $this->fields['softLimit'] = $softLimit;

        return $this;
    }

    public function getHardLimit(): ?QuoteChangeOrderItemsUsageLimitsHardLimit
    {
        return $this->fields['hardLimit'] ?? null;
    }

    public function setHardLimit(null|QuoteChangeOrderItemsUsageLimitsHardLimit|array $hardLimit): static
    {
        if ($hardLimit !== null && !($hardLimit instanceof QuoteChangeOrderItemsUsageLimitsHardLimit)) {
            $hardLimit = QuoteChangeOrderItemsUsageLimitsHardLimit::from($hardLimit);
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
