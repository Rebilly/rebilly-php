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

class LimepaySettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('storeDocumentId', $data)) {
            $this->setStoreDocumentId($data['storeDocumentId']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getStoreDocumentId(): ?bool
    {
        return $this->fields['storeDocumentId'] ?? null;
    }

    public function setStoreDocumentId(null|bool $storeDocumentId): static
    {
        $this->fields['storeDocumentId'] = $storeDocumentId;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('storeDocumentId', $this->fields)) {
            $data['storeDocumentId'] = $this->fields['storeDocumentId'];
        }

        return $data;
    }
}
