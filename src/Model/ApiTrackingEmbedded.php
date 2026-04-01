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

class ApiTrackingEmbedded implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('organization', $data)) {
            $this->setOrganization($data['organization']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getOrganization(): ?Organization
    {
        return $this->fields['organization'] ?? null;
    }

    public function setOrganization(null|Organization|array $organization): static
    {
        if ($organization !== null && !($organization instanceof Organization)) {
            $organization = Organization::from($organization);
        }

        $this->fields['organization'] = $organization;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('organization', $this->fields)) {
            $data['organization'] = $this->fields['organization']?->jsonSerialize();
        }

        return $data;
    }
}
