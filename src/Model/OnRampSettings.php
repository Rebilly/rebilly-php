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

class OnRampSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('useServerToServerApi', $data)) {
            $this->setUseServerToServerApi($data['useServerToServerApi']);
        }
        if (array_key_exists('logoUrl', $data)) {
            $this->setLogoUrl($data['logoUrl']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getUseServerToServerApi(): ?bool
    {
        return $this->fields['useServerToServerApi'] ?? null;
    }

    public function setUseServerToServerApi(null|bool $useServerToServerApi): self
    {
        $this->fields['useServerToServerApi'] = $useServerToServerApi;

        return $this;
    }

    public function getLogoUrl(): ?string
    {
        return $this->fields['logoUrl'] ?? null;
    }

    public function setLogoUrl(null|string $logoUrl): self
    {
        $this->fields['logoUrl'] = $logoUrl;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('useServerToServerApi', $this->fields)) {
            $data['useServerToServerApi'] = $this->fields['useServerToServerApi'];
        }
        if (array_key_exists('logoUrl', $this->fields)) {
            $data['logoUrl'] = $this->fields['logoUrl'];
        }

        return $data;
    }
}
