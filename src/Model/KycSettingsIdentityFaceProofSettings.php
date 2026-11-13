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

class KycSettingsIdentityFaceProofSettings implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('minimumBrightness', $data)) {
            $this->setMinimumBrightness($data['minimumBrightness']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getMinimumBrightness(): ?int
    {
        return $this->fields['minimumBrightness'] ?? null;
    }

    public function setMinimumBrightness(null|int $minimumBrightness): static
    {
        $this->fields['minimumBrightness'] = $minimumBrightness;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('minimumBrightness', $this->fields)) {
            $data['minimumBrightness'] = $this->fields['minimumBrightness'];
        }

        return $data;
    }
}
