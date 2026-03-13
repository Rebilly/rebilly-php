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

class AsiaPaymentGatewaySettings implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('use3DSEndpoint', $data)) {
            $this->setUse3DSEndpoint($data['use3DSEndpoint']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getUse3DSEndpoint(): ?bool
    {
        return $this->fields['use3DSEndpoint'] ?? null;
    }

    public function setUse3DSEndpoint(null|bool $use3DSEndpoint): static
    {
        $this->fields['use3DSEndpoint'] = $use3DSEndpoint;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('use3DSEndpoint', $this->fields)) {
            $data['use3DSEndpoint'] = $this->fields['use3DSEndpoint'];
        }

        return $data;
    }
}
