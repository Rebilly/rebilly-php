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

class KycProhibitedSubtypeRule implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('when', $data)) {
            $this->setWhen($data['when']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getWhen(): ?KycProhibitedSubtypeCondition
    {
        return $this->fields['when'] ?? null;
    }

    public function setWhen(null|KycProhibitedSubtypeCondition|array $when): static
    {
        if ($when !== null && !($when instanceof KycProhibitedSubtypeCondition)) {
            $when = KycProhibitedSubtypeCondition::from($when);
        }

        $this->fields['when'] = $when;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('when', $this->fields)) {
            $data['when'] = $this->fields['when']?->jsonSerialize();
        }

        return $data;
    }
}
