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

class AmlHitDecision implements JsonSerializable
{
    use HasMetadata;

    public const DECISION_CONFIRMED_MATCH = 'confirmed-match';

    public const DECISION_FALSE_POSITIVE = 'false-positive';

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('index', $data)) {
            $this->setIndex($data['index']);
        }
        if (array_key_exists('decision', $data)) {
            $this->setDecision($data['decision']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getIndex(): int
    {
        return $this->fields['index'];
    }

    public function setIndex(int $index): static
    {
        $this->fields['index'] = $index;

        return $this;
    }

    public function getDecision(): string
    {
        return $this->fields['decision'];
    }

    public function setDecision(string $decision): static
    {
        $this->fields['decision'] = $decision;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('index', $this->fields)) {
            $data['index'] = $this->fields['index'];
        }
        if (array_key_exists('decision', $this->fields)) {
            $data['decision'] = $this->fields['decision'];
        }

        return $data;
    }
}
