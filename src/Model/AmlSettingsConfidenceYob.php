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

class AmlSettingsConfidenceYob implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('exactMatch', $data)) {
            $this->setExactMatch($data['exactMatch']);
        }
        if (array_key_exists('inexactMatch', $data)) {
            $this->setInexactMatch($data['inexactMatch']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getExactMatch(): ?AmlCompoundConfidence
    {
        return $this->fields['exactMatch'] ?? null;
    }

    public function setExactMatch(null|AmlCompoundConfidence|array $exactMatch): static
    {
        if ($exactMatch !== null && !($exactMatch instanceof AmlCompoundConfidence)) {
            $exactMatch = AmlCompoundConfidence::from($exactMatch);
        }

        $this->fields['exactMatch'] = $exactMatch;

        return $this;
    }

    public function getInexactMatch(): ?AmlCompoundConfidence
    {
        return $this->fields['inexactMatch'] ?? null;
    }

    public function setInexactMatch(null|AmlCompoundConfidence|array $inexactMatch): static
    {
        if ($inexactMatch !== null && !($inexactMatch instanceof AmlCompoundConfidence)) {
            $inexactMatch = AmlCompoundConfidence::from($inexactMatch);
        }

        $this->fields['inexactMatch'] = $inexactMatch;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('exactMatch', $this->fields)) {
            $data['exactMatch'] = $this->fields['exactMatch']?->jsonSerialize();
        }
        if (array_key_exists('inexactMatch', $this->fields)) {
            $data['inexactMatch'] = $this->fields['inexactMatch']?->jsonSerialize();
        }

        return $data;
    }
}
