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

class StripeThreeDSecureServer implements JsonSerializable
{
    use HasMetadata;

    public const NAME_STRIPE3_DS_SERVER = 'Stripe3dsServer';

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
        if (array_key_exists('enforceThreeDSecure', $data)) {
            $this->setEnforceThreeDSecure($data['enforceThreeDSecure']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getName(): string
    {
        return $this->fields['name'];
    }

    public function setName(string $name): static
    {
        $this->fields['name'] = $name;

        return $this;
    }

    public function getEnforceThreeDSecure(): ?bool
    {
        return $this->fields['enforceThreeDSecure'] ?? null;
    }

    public function setEnforceThreeDSecure(null|bool $enforceThreeDSecure): static
    {
        $this->fields['enforceThreeDSecure'] = $enforceThreeDSecure;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('name', $this->fields)) {
            $data['name'] = $this->fields['name'];
        }
        if (array_key_exists('enforceThreeDSecure', $this->fields)) {
            $data['enforceThreeDSecure'] = $this->fields['enforceThreeDSecure'];
        }

        return $data;
    }
}
