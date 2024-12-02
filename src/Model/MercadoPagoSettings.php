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

class MercadoPagoSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('collectDeviceId', $data)) {
            $this->setCollectDeviceId($data['collectDeviceId']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCollectDeviceId(): ?bool
    {
        return $this->fields['collectDeviceId'] ?? null;
    }

    public function setCollectDeviceId(null|bool $collectDeviceId): static
    {
        $this->fields['collectDeviceId'] = $collectDeviceId;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('collectDeviceId', $this->fields)) {
            $data['collectDeviceId'] = $this->fields['collectDeviceId'];
        }

        return $data;
    }
}
