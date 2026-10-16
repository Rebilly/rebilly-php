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

class SecuritySettingsMfaAdoption implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('enrolled', $data)) {
            $this->setEnrolled($data['enrolled']);
        }
        if (array_key_exists('total', $data)) {
            $this->setTotal($data['total']);
        }
        if (array_key_exists('pending', $data)) {
            $this->setPending($data['pending']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getEnrolled(): int
    {
        return $this->fields['enrolled'];
    }

    public function setEnrolled(int $enrolled): static
    {
        $this->fields['enrolled'] = $enrolled;

        return $this;
    }

    public function getTotal(): int
    {
        return $this->fields['total'];
    }

    public function setTotal(int $total): static
    {
        $this->fields['total'] = $total;

        return $this;
    }

    public function getPending(): int
    {
        return $this->fields['pending'];
    }

    public function setPending(int $pending): static
    {
        $this->fields['pending'] = $pending;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('enrolled', $this->fields)) {
            $data['enrolled'] = $this->fields['enrolled'];
        }
        if (array_key_exists('total', $this->fields)) {
            $data['total'] = $this->fields['total'];
        }
        if (array_key_exists('pending', $this->fields)) {
            $data['pending'] = $this->fields['pending'];
        }

        return $data;
    }
}
