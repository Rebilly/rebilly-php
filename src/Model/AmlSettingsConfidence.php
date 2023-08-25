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
        if (array_key_exists('noDobExactMatch', $data)) {
            $this->setNoDobExactMatch($data['noDobExactMatch']);
        }
        if (array_key_exists('noDobInexactMatch', $data)) {
            $this->setNoDobInexactMatch($data['noDobInexactMatch']);
        }
        if (array_key_exists('noDobWeakMatch', $data)) {
            $this->setNoDobWeakMatch($data['noDobWeakMatch']);
        }
        if (array_key_exists('dobExactMatch', $data)) {
            $this->setDobExactMatch($data['dobExactMatch']);
        }
        if (array_key_exists('dobInexactMatch', $data)) {
            $this->setDobInexactMatch($data['dobInexactMatch']);
        }
        if (array_key_exists('yobExactMatch', $data)) {
            $this->setYobExactMatch($data['yobExactMatch']);
        }
        if (array_key_exists('yobInexactMatch', $data)) {
            $this->setYobInexactMatch($data['yobInexactMatch']);
        }
        if (array_key_exists('inexactYobExactMatch', $data)) {
            $this->setInexactYobExactMatch($data['inexactYobExactMatch']);
        }
        if (array_key_exists('inexactYobInexactMatch', $data)) {
            $this->setInexactYobInexactMatch($data['inexactYobInexactMatch']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getNoDobExactMatch(): ?AmlSettingsConfidenceNoDobExactMatch
    {
        return $this->fields['noDobExactMatch'] ?? null;
    }

    public function setNoDobExactMatch(null|AmlSettingsConfidenceNoDobExactMatch|array $noDobExactMatch): static
    {
        if ($noDobExactMatch !== null && !($noDobExactMatch instanceof AmlSettingsConfidenceNoDobExactMatch)) {
            $noDobExactMatch = AmlSettingsConfidenceNoDobExactMatch::from($noDobExactMatch);
        }

        $this->fields['noDobExactMatch'] = $noDobExactMatch;

        return $this;
    }

    public function getNoDobInexactMatch(): ?AmlSettingsConfidenceNoDobInexactMatch
    {
        return $this->fields['noDobInexactMatch'] ?? null;
    }

    public function setNoDobInexactMatch(null|AmlSettingsConfidenceNoDobInexactMatch|array $noDobInexactMatch): static
    {
        if ($noDobInexactMatch !== null && !($noDobInexactMatch instanceof AmlSettingsConfidenceNoDobInexactMatch)) {
            $noDobInexactMatch = AmlSettingsConfidenceNoDobInexactMatch::from($noDobInexactMatch);
        }

        $this->fields['noDobInexactMatch'] = $noDobInexactMatch;

        return $this;
    }

    public function getNoDobWeakMatch(): ?AmlSettingsConfidenceNoDobWeakMatch
    {
        return $this->fields['noDobWeakMatch'] ?? null;
    }

    public function setNoDobWeakMatch(null|AmlSettingsConfidenceNoDobWeakMatch|array $noDobWeakMatch): static
    {
        if ($noDobWeakMatch !== null && !($noDobWeakMatch instanceof AmlSettingsConfidenceNoDobWeakMatch)) {
            $noDobWeakMatch = AmlSettingsConfidenceNoDobWeakMatch::from($noDobWeakMatch);
        }

        $this->fields['noDobWeakMatch'] = $noDobWeakMatch;

        return $this;
    }

    public function getDobExactMatch(): ?AmlSettingsConfidenceDobExactMatch
    {
        return $this->fields['dobExactMatch'] ?? null;
    }

    public function setDobExactMatch(null|AmlSettingsConfidenceDobExactMatch|array $dobExactMatch): static
    {
        if ($dobExactMatch !== null && !($dobExactMatch instanceof AmlSettingsConfidenceDobExactMatch)) {
            $dobExactMatch = AmlSettingsConfidenceDobExactMatch::from($dobExactMatch);
        }

        $this->fields['dobExactMatch'] = $dobExactMatch;

        return $this;
    }

    public function getDobInexactMatch(): ?AmlSettingsConfidenceDobInexactMatch
    {
        return $this->fields['dobInexactMatch'] ?? null;
    }

    public function setDobInexactMatch(null|AmlSettingsConfidenceDobInexactMatch|array $dobInexactMatch): static
    {
        if ($dobInexactMatch !== null && !($dobInexactMatch instanceof AmlSettingsConfidenceDobInexactMatch)) {
            $dobInexactMatch = AmlSettingsConfidenceDobInexactMatch::from($dobInexactMatch);
        }

        $this->fields['dobInexactMatch'] = $dobInexactMatch;

        return $this;
    }

    public function getYobExactMatch(): ?AmlSettingsConfidenceYobExactMatch
    {
        return $this->fields['yobExactMatch'] ?? null;
    }

    public function setYobExactMatch(null|AmlSettingsConfidenceYobExactMatch|array $yobExactMatch): static
    {
        if ($yobExactMatch !== null && !($yobExactMatch instanceof AmlSettingsConfidenceYobExactMatch)) {
            $yobExactMatch = AmlSettingsConfidenceYobExactMatch::from($yobExactMatch);
        }

        $this->fields['yobExactMatch'] = $yobExactMatch;

        return $this;
    }

    public function getYobInexactMatch(): ?AmlSettingsConfidenceYobInexactMatch
    {
        return $this->fields['yobInexactMatch'] ?? null;
    }

    public function setYobInexactMatch(null|AmlSettingsConfidenceYobInexactMatch|array $yobInexactMatch): static
    {
        if ($yobInexactMatch !== null && !($yobInexactMatch instanceof AmlSettingsConfidenceYobInexactMatch)) {
            $yobInexactMatch = AmlSettingsConfidenceYobInexactMatch::from($yobInexactMatch);
        }

        $this->fields['yobInexactMatch'] = $yobInexactMatch;

        return $this;
    }

    public function getInexactYobExactMatch(): ?AmlSettingsConfidenceInexactYobExactMatch
    {
        return $this->fields['inexactYobExactMatch'] ?? null;
    }

    public function setInexactYobExactMatch(null|AmlSettingsConfidenceInexactYobExactMatch|array $inexactYobExactMatch): static
    {
        if ($inexactYobExactMatch !== null && !($inexactYobExactMatch instanceof AmlSettingsConfidenceInexactYobExactMatch)) {
            $inexactYobExactMatch = AmlSettingsConfidenceInexactYobExactMatch::from($inexactYobExactMatch);
        }

        $this->fields['inexactYobExactMatch'] = $inexactYobExactMatch;

        return $this;
    }

    public function getInexactYobInexactMatch(): ?AmlSettingsConfidenceInexactYobInexactMatch
    {
        return $this->fields['inexactYobInexactMatch'] ?? null;
    }

    public function setInexactYobInexactMatch(null|AmlSettingsConfidenceInexactYobInexactMatch|array $inexactYobInexactMatch): static
    {
        if ($inexactYobInexactMatch !== null && !($inexactYobInexactMatch instanceof AmlSettingsConfidenceInexactYobInexactMatch)) {
            $inexactYobInexactMatch = AmlSettingsConfidenceInexactYobInexactMatch::from($inexactYobInexactMatch);
        }

        $this->fields['inexactYobInexactMatch'] = $inexactYobInexactMatch;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('noDobExactMatch', $this->fields)) {
            $data['noDobExactMatch'] = $this->fields['noDobExactMatch']?->jsonSerialize();
        }
        if (array_key_exists('noDobInexactMatch', $this->fields)) {
            $data['noDobInexactMatch'] = $this->fields['noDobInexactMatch']?->jsonSerialize();
        }
        if (array_key_exists('noDobWeakMatch', $this->fields)) {
            $data['noDobWeakMatch'] = $this->fields['noDobWeakMatch']?->jsonSerialize();
        }
        if (array_key_exists('dobExactMatch', $this->fields)) {
            $data['dobExactMatch'] = $this->fields['dobExactMatch']?->jsonSerialize();
        }
        if (array_key_exists('dobInexactMatch', $this->fields)) {
            $data['dobInexactMatch'] = $this->fields['dobInexactMatch']?->jsonSerialize();
        }
        if (array_key_exists('yobExactMatch', $this->fields)) {
            $data['yobExactMatch'] = $this->fields['yobExactMatch']?->jsonSerialize();
        }
        if (array_key_exists('yobInexactMatch', $this->fields)) {
            $data['yobInexactMatch'] = $this->fields['yobInexactMatch']?->jsonSerialize();
        }
        if (array_key_exists('inexactYobExactMatch', $this->fields)) {
            $data['inexactYobExactMatch'] = $this->fields['inexactYobExactMatch']?->jsonSerialize();
        }
        if (array_key_exists('inexactYobInexactMatch', $this->fields)) {
            $data['inexactYobInexactMatch'] = $this->fields['inexactYobInexactMatch']?->jsonSerialize();
        }

        return $data;
    }
}
