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

class KycRequestDocument implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('subtypes', $data)) {
            $this->setSubtypes($data['subtypes']);
        }
        if (array_key_exists('maxAttempts', $data)) {
            $this->setMaxAttempts($data['maxAttempts']);
        }
        if (array_key_exists('faceProofRequired', $data)) {
            $this->setFaceProofRequired($data['faceProofRequired']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getType(): string
    {
        return $this->fields['type'];
    }

    public function setType(string $type): static
    {
        $this->fields['type'] = $type;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getSubtypes(): ?array
    {
        return $this->fields['subtypes'] ?? null;
    }

    /**
     * @param null|string[] $subtypes
     */
    public function setSubtypes(null|array $subtypes): static
    {
        $this->fields['subtypes'] = $subtypes;

        return $this;
    }

    public function getMaxAttempts(): ?int
    {
        return $this->fields['maxAttempts'] ?? null;
    }

    public function setMaxAttempts(null|int $maxAttempts): static
    {
        $this->fields['maxAttempts'] = $maxAttempts;

        return $this;
    }

    public function getFaceProofRequired(): ?bool
    {
        return $this->fields['faceProofRequired'] ?? null;
    }

    public function setFaceProofRequired(null|bool $faceProofRequired): static
    {
        $this->fields['faceProofRequired'] = $faceProofRequired;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('subtypes', $this->fields)) {
            $data['subtypes'] = $this->fields['subtypes'];
        }
        if (array_key_exists('maxAttempts', $this->fields)) {
            $data['maxAttempts'] = $this->fields['maxAttempts'];
        }
        if (array_key_exists('faceProofRequired', $this->fields)) {
            $data['faceProofRequired'] = $this->fields['faceProofRequired'];
        }

        return $data;
    }
}
