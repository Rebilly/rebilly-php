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

class PayoutRequestCancellation implements JsonSerializable
{
    use HasMetadata;

    public const CANCELED_BY_MERCHANT = 'merchant';

    public const CANCELED_BY_CUSTOMER = 'customer';

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('canceledBy', $data)) {
            $this->setCanceledBy($data['canceledBy']);
        }
        if (array_key_exists('description', $data)) {
            $this->setDescription($data['description']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getCanceledBy(): ?string
    {
        return $this->fields['canceledBy'] ?? null;
    }

    public function setCanceledBy(null|string $canceledBy): static
    {
        $this->fields['canceledBy'] = $canceledBy;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->fields['description'] ?? null;
    }

    public function setDescription(null|string $description): static
    {
        $this->fields['description'] = $description;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('canceledBy', $this->fields)) {
            $data['canceledBy'] = $this->fields['canceledBy'];
        }
        if (array_key_exists('description', $this->fields)) {
            $data['description'] = $this->fields['description'];
        }

        return $data;
    }
}
