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

class GetReleaseFlagsResponse implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('enabled', $data)) {
            $this->setEnabled($data['enabled']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    /**
     * @return string[]
     */
    public function getEnabled(): array
    {
        return $this->fields['enabled'];
    }

    /**
     * @param string[] $enabled
     */
    public function setEnabled(array $enabled): static
    {
        $this->fields['enabled'] = $enabled;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('enabled', $this->fields)) {
            $data['enabled'] = $this->fields['enabled'];
        }

        return $data;
    }
}
