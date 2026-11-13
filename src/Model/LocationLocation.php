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

class LocationLocation implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('lat', $data)) {
            $this->setLat($data['lat']);
        }
        if (array_key_exists('lng', $data)) {
            $this->setLng($data['lng']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getLat(): float
    {
        return $this->fields['lat'];
    }

    public function setLat(float|string $lat): static
    {
        if (is_string($lat)) {
            $lat = (float) $lat;
        }

        $this->fields['lat'] = $lat;

        return $this;
    }

    public function getLng(): float
    {
        return $this->fields['lng'];
    }

    public function setLng(float|string $lng): static
    {
        if (is_string($lng)) {
            $lng = (float) $lng;
        }

        $this->fields['lng'] = $lng;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('lat', $this->fields)) {
            $data['lat'] = $this->fields['lat'];
        }
        if (array_key_exists('lng', $this->fields)) {
            $data['lng'] = $this->fields['lng'];
        }

        return $data;
    }
}
