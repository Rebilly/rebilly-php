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

class CoinPaymentsSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('useCallbackAddress', $data)) {
            $this->setUseCallbackAddress($data['useCallbackAddress']);
        }
        if (array_key_exists('useV2Api', $data)) {
            $this->setUseV2Api($data['useV2Api']);
        }
        if (array_key_exists('apiUrl', $data)) {
            $this->setApiUrl($data['apiUrl']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getUseCallbackAddress(): ?bool
    {
        return $this->fields['useCallbackAddress'] ?? null;
    }

    public function setUseCallbackAddress(null|bool $useCallbackAddress): static
    {
        $this->fields['useCallbackAddress'] = $useCallbackAddress;

        return $this;
    }

    public function getUseV2Api(): ?bool
    {
        return $this->fields['useV2Api'] ?? null;
    }

    public function setUseV2Api(null|bool $useV2Api): static
    {
        $this->fields['useV2Api'] = $useV2Api;

        return $this;
    }

    public function getApiUrl(): ?string
    {
        return $this->fields['apiUrl'] ?? null;
    }

    public function setApiUrl(null|string $apiUrl): static
    {
        $this->fields['apiUrl'] = $apiUrl;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('useCallbackAddress', $this->fields)) {
            $data['useCallbackAddress'] = $this->fields['useCallbackAddress'];
        }
        if (array_key_exists('useV2Api', $this->fields)) {
            $data['useV2Api'] = $this->fields['useV2Api'];
        }
        if (array_key_exists('apiUrl', $this->fields)) {
            $data['apiUrl'] = $this->fields['apiUrl'];
        }

        return $data;
    }
}
