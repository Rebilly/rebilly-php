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

class PayClubSettings implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('use3DSChannel', $data)) {
            $this->setUse3DSChannel($data['use3DSChannel']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getUse3DSChannel(): ?bool
    {
        return $this->fields['use3DSChannel'] ?? null;
    }

    public function setUse3DSChannel(null|bool $use3DSChannel): static
    {
        $this->fields['use3DSChannel'] = $use3DSChannel;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('use3DSChannel', $this->fields)) {
            $data['use3DSChannel'] = $this->fields['use3DSChannel'];
        }

        return $data;
    }
}
