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

class ProofOfIdentityKycDocumentEmbedded implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('customer', $data)) {
            $this->setCustomer($data['customer']);
        }
        if (array_key_exists('files', $data)) {
            $this->setFiles($data['files']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCustomer(): null|object|array
    {
        return $this->fields['customer'] ?? null;
    }

    public function setCustomer(null|object|array $customer): static
    {
        $this->fields['customer'] = $customer;

        return $this;
    }

    public function getFiles(): ?array
    {
        return $this->fields['files'] ?? null;
    }

    public function setFiles(null|array $files): static
    {
        $this->fields['files'] = $files;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('customer', $this->fields)) {
            $data['customer'] = $this->fields['customer'];
        }
        if (array_key_exists('files', $this->fields)) {
            $data['files'] = $this->fields['files'];
        }

        return $data;
    }
}
