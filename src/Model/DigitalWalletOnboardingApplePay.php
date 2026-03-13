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

class DigitalWalletOnboardingApplePay implements JsonSerializable
{
    use HasMetadata;

    public const STATUS_FAILED = 'failed';

    public const STATUS_REGISTERED = 'registered';

    public const STATUS_ALREADY_REGISTERED = 'already-registered';

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('domain', $data)) {
            $this->setDomain($data['domain']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getDomain(): string
    {
        return $this->fields['domain'];
    }

    public function setDomain(string $domain): static
    {
        $this->fields['domain'] = $domain;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('domain', $this->fields)) {
            $data['domain'] = $this->fields['domain'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }

        return $data;
    }

    private function setStatus(null|string $status): static
    {
        $this->fields['status'] = $status;

        return $this;
    }
}
