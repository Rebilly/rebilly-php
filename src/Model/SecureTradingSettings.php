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

class SecureTradingSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('enableRecurring', $data)) {
            $this->setEnableRecurring($data['enableRecurring']);
        }
        if (array_key_exists('includeParentTransactionForRecurring', $data)) {
            $this->setIncludeParentTransactionForRecurring($data['includeParentTransactionForRecurring']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getEnableRecurring(): ?bool
    {
        return $this->fields['enableRecurring'] ?? null;
    }

    public function setEnableRecurring(null|bool $enableRecurring): static
    {
        $this->fields['enableRecurring'] = $enableRecurring;

        return $this;
    }

    public function getIncludeParentTransactionForRecurring(): ?bool
    {
        return $this->fields['includeParentTransactionForRecurring'] ?? null;
    }

    public function setIncludeParentTransactionForRecurring(null|bool $includeParentTransactionForRecurring): static
    {
        $this->fields['includeParentTransactionForRecurring'] = $includeParentTransactionForRecurring;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('enableRecurring', $this->fields)) {
            $data['enableRecurring'] = $this->fields['enableRecurring'];
        }
        if (array_key_exists('includeParentTransactionForRecurring', $this->fields)) {
            $data['includeParentTransactionForRecurring'] = $this->fields['includeParentTransactionForRecurring'];
        }

        return $data;
    }
}
