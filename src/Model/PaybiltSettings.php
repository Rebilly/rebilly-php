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

class PaybiltSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('delay', $data)) {
            $this->setDelay($data['delay']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getDelay(): ?int
    {
        return $this->fields['delay'] ?? null;
    }

    public function setDelay(null|int $delay): static
    {
        $this->fields['delay'] = $delay;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('delay', $this->fields)) {
            $data['delay'] = $this->fields['delay'];
        }

        return $data;
    }
}
