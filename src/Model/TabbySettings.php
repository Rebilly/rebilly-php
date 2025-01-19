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

class TabbySettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('category', $data)) {
            $this->setCategory($data['category']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCategory(): ?string
    {
        return $this->fields['category'] ?? null;
    }

    public function setCategory(null|string $category): static
    {
        $this->fields['category'] = $category;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('category', $this->fields)) {
            $data['category'] = $this->fields['category'];
        }

        return $data;
    }
}
