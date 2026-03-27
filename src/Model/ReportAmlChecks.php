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

class ReportAmlChecks implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('total', $data)) {
            $this->setTotal($data['total']);
        }
        if (array_key_exists('propagated', $data)) {
            $this->setPropagated($data['propagated']);
        }
        if (array_key_exists('resulted', $data)) {
            $this->setResulted($data['resulted']);
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

    public function getTotal(): ?int
    {
        return $this->fields['total'] ?? null;
    }

    public function setTotal(null|int $total): static
    {
        $this->fields['total'] = $total;

        return $this;
    }

    public function getPropagated(): ?int
    {
        return $this->fields['propagated'] ?? null;
    }

    public function setPropagated(null|int $propagated): static
    {
        $this->fields['propagated'] = $propagated;

        return $this;
    }

    public function getResulted(): ?int
    {
        return $this->fields['resulted'] ?? null;
    }

    public function setResulted(null|int $resulted): static
    {
        $this->fields['resulted'] = $resulted;

        return $this;
    }

    public function getPending(): ?int
    {
        return $this->fields['pending'] ?? null;
    }

    public function setPending(null|int $pending): static
    {
        $this->fields['pending'] = $pending;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('total', $this->fields)) {
            $data['total'] = $this->fields['total'];
        }
        if (array_key_exists('propagated', $this->fields)) {
            $data['propagated'] = $this->fields['propagated'];
        }
        if (array_key_exists('resulted', $this->fields)) {
            $data['resulted'] = $this->fields['resulted'];
        }
        if (array_key_exists('pending', $this->fields)) {
            $data['pending'] = $this->fields['pending'];
        }

        return $data;
    }
}
