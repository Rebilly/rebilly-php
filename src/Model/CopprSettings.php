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

class CopprSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('rebillyPublishableKey', $data)) {
            $this->setRebillyPublishableKey($data['rebillyPublishableKey']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getRebillyPublishableKey(): ?string
    {
        return $this->fields['rebillyPublishableKey'] ?? null;
    }

    public function setRebillyPublishableKey(null|string $rebillyPublishableKey): static
    {
        $this->fields['rebillyPublishableKey'] = $rebillyPublishableKey;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('rebillyPublishableKey', $this->fields)) {
            $data['rebillyPublishableKey'] = $this->fields['rebillyPublishableKey'];
        }

        return $data;
    }
}
