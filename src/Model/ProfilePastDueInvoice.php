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
use Rebilly\Sdk\Trait\HasMetadata;

class ProfilePastDueInvoice implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('invoiceId', $data)) {
            $this->setInvoiceId($data['invoiceId']);
        }
        if (array_key_exists('websiteId', $data)) {
            $this->setWebsiteId($data['websiteId']);
        }
        if (array_key_exists('token', $data)) {
            $this->setToken($data['token']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getInvoiceId(): string
    {
        return $this->fields['invoiceId'];
    }

    public function getWebsiteId(): string
    {
        return $this->fields['websiteId'];
    }

    public function getToken(): ?string
    {
        return $this->fields['token'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('invoiceId', $this->fields)) {
            $data['invoiceId'] = $this->fields['invoiceId'];
        }
        if (array_key_exists('websiteId', $this->fields)) {
            $data['websiteId'] = $this->fields['websiteId'];
        }
        if (array_key_exists('token', $this->fields)) {
            $data['token'] = $this->fields['token'];
        }

        return $data;
    }

    private function setInvoiceId(string $invoiceId): static
    {
        $this->fields['invoiceId'] = $invoiceId;

        return $this;
    }

    private function setWebsiteId(string $websiteId): static
    {
        $this->fields['websiteId'] = $websiteId;

        return $this;
    }

    private function setToken(null|string $token): static
    {
        $this->fields['token'] = $token;

        return $this;
    }
}
