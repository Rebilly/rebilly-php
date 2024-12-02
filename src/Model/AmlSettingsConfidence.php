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

class AmlSettingsConfidence implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('dob', $data)) {
            $this->setDob($data['dob']);
        }
        if (array_key_exists('noDob', $data)) {
            $this->setNoDob($data['noDob']);
        }
        if (array_key_exists('yob', $data)) {
            $this->setYob($data['yob']);
        }
        if (array_key_exists('inexactYob', $data)) {
            $this->setInexactYob($data['inexactYob']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getDob(): ?AmlSettingsConfidenceDob
    {
        return $this->fields['dob'] ?? null;
    }

    public function setDob(null|AmlSettingsConfidenceDob|array $dob): static
    {
        if ($dob !== null && !($dob instanceof AmlSettingsConfidenceDob)) {
            $dob = AmlSettingsConfidenceDob::from($dob);
        }

        $this->fields['dob'] = $dob;

        return $this;
    }

    public function getNoDob(): ?AmlSettingsConfidenceNoDob
    {
        return $this->fields['noDob'] ?? null;
    }

    public function setNoDob(null|AmlSettingsConfidenceNoDob|array $noDob): static
    {
        if ($noDob !== null && !($noDob instanceof AmlSettingsConfidenceNoDob)) {
            $noDob = AmlSettingsConfidenceNoDob::from($noDob);
        }

        $this->fields['noDob'] = $noDob;

        return $this;
    }

    public function getYob(): ?AmlSettingsConfidenceYob
    {
        return $this->fields['yob'] ?? null;
    }

    public function setYob(null|AmlSettingsConfidenceYob|array $yob): static
    {
        if ($yob !== null && !($yob instanceof AmlSettingsConfidenceYob)) {
            $yob = AmlSettingsConfidenceYob::from($yob);
        }

        $this->fields['yob'] = $yob;

        return $this;
    }

    public function getInexactYob(): ?AmlSettingsConfidenceInexactYob
    {
        return $this->fields['inexactYob'] ?? null;
    }

    public function setInexactYob(null|AmlSettingsConfidenceInexactYob|array $inexactYob): static
    {
        if ($inexactYob !== null && !($inexactYob instanceof AmlSettingsConfidenceInexactYob)) {
            $inexactYob = AmlSettingsConfidenceInexactYob::from($inexactYob);
        }

        $this->fields['inexactYob'] = $inexactYob;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('dob', $this->fields)) {
            $data['dob'] = $this->fields['dob']?->jsonSerialize();
        }
        if (array_key_exists('noDob', $this->fields)) {
            $data['noDob'] = $this->fields['noDob']?->jsonSerialize();
        }
        if (array_key_exists('yob', $this->fields)) {
            $data['yob'] = $this->fields['yob']?->jsonSerialize();
        }
        if (array_key_exists('inexactYob', $this->fields)) {
            $data['inexactYob'] = $this->fields['inexactYob']?->jsonSerialize();
        }

        return $data;
    }
}
