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

class PayclyCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('apiToken', $data)) {
            $this->setApiToken($data['apiToken']);
        }
        if (array_key_exists('websiteId', $data)) {
            $this->setWebsiteId($data['websiteId']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getApiToken(): string
    {
        return $this->fields['apiToken'];
    }

    public function setApiToken(string $apiToken): static
    {
        $this->fields['apiToken'] = $apiToken;

        return $this;
    }

    public function getWebsiteId(): string
    {
        return $this->fields['websiteId'];
    }

    public function setWebsiteId(string $websiteId): static
    {
        $this->fields['websiteId'] = $websiteId;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('apiToken', $this->fields)) {
            $data['apiToken'] = $this->fields['apiToken'];
        }
        if (array_key_exists('websiteId', $this->fields)) {
            $data['websiteId'] = $this->fields['websiteId'];
        }

        return $data;
    }
}
