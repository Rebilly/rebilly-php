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

class DepositRequestCustomAmount implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('minimum', $data)) {
            $this->setMinimum($data['minimum']);
        }
        if (array_key_exists('multipleOf', $data)) {
            $this->setMultipleOf($data['multipleOf']);
        }
        if (array_key_exists('maximum', $data)) {
            $this->setMaximum($data['maximum']);
        }
        if (array_key_exists('buttonText', $data)) {
            $this->setButtonText($data['buttonText']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getMinimum(): float
    {
        return $this->fields['minimum'];
    }

    public function setMinimum(float|string $minimum): static
    {
        if (is_string($minimum)) {
            $minimum = (float) $minimum;
        }

        $this->fields['minimum'] = $minimum;

        return $this;
    }

    public function getMultipleOf(): float
    {
        return $this->fields['multipleOf'];
    }

    public function setMultipleOf(float|string $multipleOf): static
    {
        if (is_string($multipleOf)) {
            $multipleOf = (float) $multipleOf;
        }

        $this->fields['multipleOf'] = $multipleOf;

        return $this;
    }

    public function getMaximum(): float
    {
        return $this->fields['maximum'];
    }

    public function setMaximum(float|string $maximum): static
    {
        if (is_string($maximum)) {
            $maximum = (float) $maximum;
        }

        $this->fields['maximum'] = $maximum;

        return $this;
    }

    /**
     * @return null|array<string,string>
     */
    public function getButtonText(): ?array
    {
        return $this->fields['buttonText'] ?? null;
    }

    /**
     * @param null|array<string,string> $buttonText
     */
    public function setButtonText(null|array $buttonText): static
    {
        $this->fields['buttonText'] = $buttonText;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('minimum', $this->fields)) {
            $data['minimum'] = $this->fields['minimum'];
        }
        if (array_key_exists('multipleOf', $this->fields)) {
            $data['multipleOf'] = $this->fields['multipleOf'];
        }
        if (array_key_exists('maximum', $this->fields)) {
            $data['maximum'] = $this->fields['maximum'];
        }
        if (array_key_exists('buttonText', $this->fields)) {
            $data['buttonText'] = $this->fields['buttonText'] !== null
                ? (object) $this->fields['buttonText']
                : null;
        }

        return $data;
    }
}
