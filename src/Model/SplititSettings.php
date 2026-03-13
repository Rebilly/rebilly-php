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

class SplititSettings implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('numberOfInstallmentsCustomField', $data)) {
            $this->setNumberOfInstallmentsCustomField($data['numberOfInstallmentsCustomField']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getNumberOfInstallmentsCustomField(): ?string
    {
        return $this->fields['numberOfInstallmentsCustomField'] ?? null;
    }

    public function setNumberOfInstallmentsCustomField(null|string $numberOfInstallmentsCustomField): static
    {
        $this->fields['numberOfInstallmentsCustomField'] = $numberOfInstallmentsCustomField;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('numberOfInstallmentsCustomField', $this->fields)) {
            $data['numberOfInstallmentsCustomField'] = $this->fields['numberOfInstallmentsCustomField'];
        }

        return $data;
    }
}
