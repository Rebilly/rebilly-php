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

class SecuritySettings implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('requireMfa', $data)) {
            $this->setRequireMfa($data['requireMfa']);
        }
        if (array_key_exists('allowedIps', $data)) {
            $this->setAllowedIps($data['allowedIps']);
        }
        if (array_key_exists('currentIpAddress', $data)) {
            $this->setCurrentIpAddress($data['currentIpAddress']);
        }
        if (array_key_exists('mfaAdoption', $data)) {
            $this->setMfaAdoption($data['mfaAdoption']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getRequireMfa(): bool
    {
        return $this->fields['requireMfa'];
    }

    public function setRequireMfa(bool $requireMfa): static
    {
        $this->fields['requireMfa'] = $requireMfa;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getAllowedIps(): ?array
    {
        return $this->fields['allowedIps'] ?? null;
    }

    /**
     * @param null|string[] $allowedIps
     */
    public function setAllowedIps(null|array $allowedIps): static
    {
        $this->fields['allowedIps'] = $allowedIps;

        return $this;
    }

    public function getCurrentIpAddress(): ?string
    {
        return $this->fields['currentIpAddress'] ?? null;
    }

    public function getMfaAdoption(): ?SecuritySettingsMfaAdoption
    {
        return $this->fields['mfaAdoption'] ?? null;
    }

    public function setMfaAdoption(null|SecuritySettingsMfaAdoption|array $mfaAdoption): static
    {
        if ($mfaAdoption !== null && !($mfaAdoption instanceof SecuritySettingsMfaAdoption)) {
            $mfaAdoption = SecuritySettingsMfaAdoption::from($mfaAdoption);
        }

        $this->fields['mfaAdoption'] = $mfaAdoption;

        return $this;
    }

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('requireMfa', $this->fields)) {
            $data['requireMfa'] = $this->fields['requireMfa'];
        }
        if (array_key_exists('allowedIps', $this->fields)) {
            $data['allowedIps'] = $this->fields['allowedIps'];
        }
        if (array_key_exists('currentIpAddress', $this->fields)) {
            $data['currentIpAddress'] = $this->fields['currentIpAddress'];
        }
        if (array_key_exists('mfaAdoption', $this->fields)) {
            $data['mfaAdoption'] = $this->fields['mfaAdoption']?->jsonSerialize();
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'] !== null
                ? array_map(
                    static fn (ResourceLink $resourceLink) => $resourceLink->jsonSerialize(),
                    $this->fields['_links'],
                )
                : null;
        }

        return $data;
    }

    private function setCurrentIpAddress(null|string $currentIpAddress): static
    {
        $this->fields['currentIpAddress'] = $currentIpAddress;

        return $this;
    }

    /**
     * @param null|array[]|ResourceLink[] $links
     */
    private function setLinks(null|array $links): static
    {
        $links = $links !== null ? array_map(
            fn ($value) => $value instanceof ResourceLink ? $value : ResourceLink::from($value),
            $links,
        ) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
