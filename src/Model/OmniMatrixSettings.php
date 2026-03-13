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

class OmniMatrixSettings implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('usePreconfiguredAmounts', $data)) {
            $this->setUsePreconfiguredAmounts($data['usePreconfiguredAmounts']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getUsePreconfiguredAmounts(): ?bool
    {
        return $this->fields['usePreconfiguredAmounts'] ?? null;
    }

    public function setUsePreconfiguredAmounts(null|bool $usePreconfiguredAmounts): static
    {
        $this->fields['usePreconfiguredAmounts'] = $usePreconfiguredAmounts;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('usePreconfiguredAmounts', $this->fields)) {
            $data['usePreconfiguredAmounts'] = $this->fields['usePreconfiguredAmounts'];
        }

        return $data;
    }
}
