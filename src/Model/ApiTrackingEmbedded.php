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

class ApiTrackingEmbedded implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('organization', $data)) {
            $this->setOrganization($data['organization']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getOrganization(): ?object
    {
        return $this->fields['organization'] ?? null;
    }

    public function setOrganization(null|object $organization): static
    {
        $this->fields['organization'] = $organization;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('organization', $this->fields)) {
            $data['organization'] = $this->fields['organization'];
        }

        return $data;
    }
}
