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

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('enableRecurring', $this->fields)) {
            $data['enableRecurring'] = $this->fields['enableRecurring'];
        }

        return $data;
    }
}
