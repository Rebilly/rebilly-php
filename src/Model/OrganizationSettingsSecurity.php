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

class OrganizationSettingsSecurity implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('requireMfa', $data)) {
            $this->setRequireMfa($data['requireMfa']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getRequireMfa(): ?bool
    {
        return $this->fields['requireMfa'] ?? null;
    }

    public function setRequireMfa(null|bool $requireMfa): static
    {
        $this->fields['requireMfa'] = $requireMfa;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('requireMfa', $this->fields)) {
            $data['requireMfa'] = $this->fields['requireMfa'];
        }

        return $data;
    }
}
