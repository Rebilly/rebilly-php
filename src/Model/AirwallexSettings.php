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

class AirwallexSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('deviceIdCustomField', $data)) {
            $this->setDeviceIdCustomField($data['deviceIdCustomField']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getDeviceIdCustomField(): ?string
    {
        return $this->fields['deviceIdCustomField'] ?? null;
    }

    public function setDeviceIdCustomField(null|string $deviceIdCustomField): static
    {
        $this->fields['deviceIdCustomField'] = $deviceIdCustomField;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('deviceIdCustomField', $this->fields)) {
            $data['deviceIdCustomField'] = $this->fields['deviceIdCustomField'];
        }

        return $data;
    }
}
