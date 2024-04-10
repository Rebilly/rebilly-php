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

class PatchTaxJarCredential implements PatchServiceCredentialRequest, JsonSerializable
{
    public const STATUS_ACTIVE = 'active';

    public const STATUS_INACTIVE = 'inactive';

    public const STATUS_DEACTIVATED = 'deactivated';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('omitFromAddress', $data)) {
            $this->setOmitFromAddress($data['omitFromAddress']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getStatus(): string
    {
        return $this->fields['status'];
    }

    public function setStatus(string $status): static
    {
        $this->fields['status'] = $status;

        return $this;
    }

    public function getOmitFromAddress(): ?bool
    {
        return $this->fields['omitFromAddress'] ?? null;
    }

    public function setOmitFromAddress(null|bool $omitFromAddress): static
    {
        $this->fields['omitFromAddress'] = $omitFromAddress;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('omitFromAddress', $this->fields)) {
            $data['omitFromAddress'] = $this->fields['omitFromAddress'];
        }

        return $data;
    }
}
