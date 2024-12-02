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

class ApplePayValidationValidationRequest implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('validationUrl', $data)) {
            $this->setValidationUrl($data['validationUrl']);
        }
        if (array_key_exists('domainName', $data)) {
            $this->setDomainName($data['domainName']);
        }
        if (array_key_exists('displayName', $data)) {
            $this->setDisplayName($data['displayName']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getValidationUrl(): ?string
    {
        return $this->fields['validationUrl'] ?? null;
    }

    public function setValidationUrl(null|string $validationUrl): static
    {
        $this->fields['validationUrl'] = $validationUrl;

        return $this;
    }

    public function getDomainName(): ?string
    {
        return $this->fields['domainName'] ?? null;
    }

    public function setDomainName(null|string $domainName): static
    {
        $this->fields['domainName'] = $domainName;

        return $this;
    }

    public function getDisplayName(): ?string
    {
        return $this->fields['displayName'] ?? null;
    }

    public function setDisplayName(null|string $displayName): static
    {
        $this->fields['displayName'] = $displayName;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('validationUrl', $this->fields)) {
            $data['validationUrl'] = $this->fields['validationUrl'];
        }
        if (array_key_exists('domainName', $this->fields)) {
            $data['domainName'] = $this->fields['domainName'];
        }
        if (array_key_exists('displayName', $this->fields)) {
            $data['displayName'] = $this->fields['displayName'];
        }

        return $data;
    }
}
