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

class RedsysSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('terminal', $data)) {
            $this->setTerminal($data['terminal']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getTerminal(): ?string
    {
        return $this->fields['terminal'] ?? null;
    }

    public function setTerminal(null|string $terminal): static
    {
        $this->fields['terminal'] = $terminal;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('terminal', $this->fields)) {
            $data['terminal'] = $this->fields['terminal'];
        }

        return $data;
    }
}
