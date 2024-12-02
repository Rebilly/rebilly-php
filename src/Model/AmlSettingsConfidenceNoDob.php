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

class AmlSettingsConfidenceNoDob implements JsonSerializable
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
        if (array_key_exists('weakMatch', $data)) {
            $this->setWeakMatch($data['weakMatch']);
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

    public function getWeakMatch(): ?AmlCompoundConfidence
    {
        return $this->fields['weakMatch'] ?? null;
    }

    public function setWeakMatch(null|AmlCompoundConfidence|array $weakMatch): static
    {
        if ($weakMatch !== null && !($weakMatch instanceof AmlCompoundConfidence)) {
            $weakMatch = AmlCompoundConfidence::from($weakMatch);
        }

        $this->fields['weakMatch'] = $weakMatch;

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
        if (array_key_exists('weakMatch', $this->fields)) {
            $data['weakMatch'] = $this->fields['weakMatch']?->jsonSerialize();
        }

        return $data;
    }
}
