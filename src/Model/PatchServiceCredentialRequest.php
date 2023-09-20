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

class PatchServiceCredentialRequest implements JsonSerializable
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
        if (array_key_exists('websiteId', $data)) {
            $this->setWebsiteId($data['websiteId']);
        }
        if (array_key_exists('clientId', $data)) {
            $this->setClientId($data['clientId']);
        }
        if (array_key_exists('secretToken', $data)) {
            $this->setSecretToken($data['secretToken']);
        }
        if (array_key_exists('useStripe', $data)) {
            $this->setUseStripe($data['useStripe']);
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

    public function getWebsiteId(): ?string
    {
        return $this->fields['websiteId'] ?? null;
    }

    public function setWebsiteId(null|string $websiteId): static
    {
        $this->fields['websiteId'] = $websiteId;

        return $this;
    }

    public function getClientId(): ?string
    {
        return $this->fields['clientId'] ?? null;
    }

    public function setClientId(null|string $clientId): static
    {
        $this->fields['clientId'] = $clientId;

        return $this;
    }

    public function getSecretToken(): ?string
    {
        return $this->fields['secretToken'] ?? null;
    }

    public function setSecretToken(null|string $secretToken): static
    {
        $this->fields['secretToken'] = $secretToken;

        return $this;
    }

    public function getUseStripe(): ?bool
    {
        return $this->fields['useStripe'] ?? null;
    }

    public function setUseStripe(null|bool $useStripe): static
    {
        $this->fields['useStripe'] = $useStripe;

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
        if (array_key_exists('websiteId', $this->fields)) {
            $data['websiteId'] = $this->fields['websiteId'];
        }
        if (array_key_exists('clientId', $this->fields)) {
            $data['clientId'] = $this->fields['clientId'];
        }
        if (array_key_exists('secretToken', $this->fields)) {
            $data['secretToken'] = $this->fields['secretToken'];
        }
        if (array_key_exists('useStripe', $this->fields)) {
            $data['useStripe'] = $this->fields['useStripe'];
        }
        if (array_key_exists('omitFromAddress', $this->fields)) {
            $data['omitFromAddress'] = $this->fields['omitFromAddress'];
        }

        return $data;
    }
}
