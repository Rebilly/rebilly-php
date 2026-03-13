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

class PatchPayoutRequestRequest implements JsonSerializable
{
    use HasMetadata;

    public const STATUS_PENDING = 'pending';

    public const STATUS_READY = 'ready';

    public const STATUS_APPROVED = 'approved';

    public const STATUS_CANCELED = 'canceled';

    public const STATUS_CUSTOMER_REVERSED = 'customer-reversed';

    public const STATUS_SYSTEM_REVERSED = 'system-reversed';

    public const STATUS_ADMIN_REVERSED = 'admin-reversed';

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('description', $data)) {
            $this->setDescription($data['description']);
        }
        if (array_key_exists('blocked', $data)) {
            $this->setBlocked($data['blocked']);
        }
        if (array_key_exists('blockReason', $data)) {
            $this->setBlockReason($data['blockReason']);
        }
        if (array_key_exists('blockDescription', $data)) {
            $this->setBlockDescription($data['blockDescription']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    public function setStatus(null|string $status): static
    {
        $this->fields['status'] = $status;

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

    public function getBlocked(): ?bool
    {
        return $this->fields['blocked'] ?? null;
    }

    public function setBlocked(null|bool $blocked): static
    {
        $this->fields['blocked'] = $blocked;

        return $this;
    }

    public function getBlockReason(): ?PayoutRequestBlockReason
    {
        return $this->fields['blockReason'] ?? null;
    }

    public function setBlockReason(null|PayoutRequestBlockReason|array $blockReason): static
    {
        if ($blockReason !== null && !($blockReason instanceof PayoutRequestBlockReason)) {
            $blockReason = PayoutRequestBlockReason::from($blockReason);
        }

        $this->fields['blockReason'] = $blockReason;

        return $this;
    }

    public function getBlockDescription(): ?string
    {
        return $this->fields['blockDescription'] ?? null;
    }

    public function setBlockDescription(null|string $blockDescription): static
    {
        $this->fields['blockDescription'] = $blockDescription;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('description', $this->fields)) {
            $data['description'] = $this->fields['description'];
        }
        if (array_key_exists('blocked', $this->fields)) {
            $data['blocked'] = $this->fields['blocked'];
        }
        if (array_key_exists('blockReason', $this->fields)) {
            $data['blockReason'] = $this->fields['blockReason']?->jsonSerialize();
        }
        if (array_key_exists('blockDescription', $this->fields)) {
            $data['blockDescription'] = $this->fields['blockDescription'];
        }

        return $data;
    }
}
