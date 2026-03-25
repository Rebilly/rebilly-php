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

class AirwallexSettings implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('deviceIdCustomField', $data)) {
            $this->setDeviceIdCustomField($data['deviceIdCustomField']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
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
