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

class GigadatCredentials implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('campaignId', $data)) {
            $this->setCampaignId($data['campaignId']);
        }
        if (array_key_exists('accessToken', $data)) {
            $this->setAccessToken($data['accessToken']);
        }
        if (array_key_exists('securityToken', $data)) {
            $this->setSecurityToken($data['securityToken']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getCampaignId(): string
    {
        return $this->fields['campaignId'];
    }

    public function setCampaignId(string $campaignId): static
    {
        $this->fields['campaignId'] = $campaignId;

        return $this;
    }

    public function getAccessToken(): string
    {
        return $this->fields['accessToken'];
    }

    public function setAccessToken(string $accessToken): static
    {
        $this->fields['accessToken'] = $accessToken;

        return $this;
    }

    public function getSecurityToken(): string
    {
        return $this->fields['securityToken'];
    }

    public function setSecurityToken(string $securityToken): static
    {
        $this->fields['securityToken'] = $securityToken;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('campaignId', $this->fields)) {
            $data['campaignId'] = $this->fields['campaignId'];
        }
        if (array_key_exists('accessToken', $this->fields)) {
            $data['accessToken'] = $this->fields['accessToken'];
        }
        if (array_key_exists('securityToken', $this->fields)) {
            $data['securityToken'] = $this->fields['securityToken'];
        }

        return $data;
    }
}
