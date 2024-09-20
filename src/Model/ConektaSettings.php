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

class ConektaSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('baseUrl', $data)) {
            $this->setBaseUrl($data['baseUrl']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getBaseUrl(): ?string
    {
        return $this->fields['baseUrl'] ?? null;
    }

    public function setBaseUrl(null|string $baseUrl): static
    {
        $this->fields['baseUrl'] = $baseUrl;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('baseUrl', $this->fields)) {
            $data['baseUrl'] = $this->fields['baseUrl'];
        }

        return $data;
    }
}
