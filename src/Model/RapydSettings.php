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

class RapydSettings implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('ipnUrl', $data)) {
            $this->setIpnUrl($data['ipnUrl']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getIpnUrl(): ?string
    {
        return $this->fields['ipnUrl'] ?? null;
    }

    public function setIpnUrl(null|string $ipnUrl): static
    {
        $this->fields['ipnUrl'] = $ipnUrl;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('ipnUrl', $this->fields)) {
            $data['ipnUrl'] = $this->fields['ipnUrl'];
        }

        return $data;
    }
}
