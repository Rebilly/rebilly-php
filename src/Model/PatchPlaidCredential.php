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

class PatchPlaidCredential implements PatchServiceCredentialRequest
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
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    public function setStatus(null|string $status): static
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

        return $data;
    }
}
