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

use Rebilly\Sdk\Trait\HasMetadata;

class RedemptionCancelTimelineAction implements TimelineAction
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('redemptionId', $data)) {
            $this->setRedemptionId($data['redemptionId']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getAction(): string
    {
        return 'redemption-cancel';
    }

    public function getRedemptionId(): ?string
    {
        return $this->fields['redemptionId'] ?? null;
    }

    public function setRedemptionId(null|string $redemptionId): static
    {
        $this->fields['redemptionId'] = $redemptionId;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'action' => 'redemption-cancel',
        ];
        if (array_key_exists('redemptionId', $this->fields)) {
            $data['redemptionId'] = $this->fields['redemptionId'];
        }

        return $data;
    }
}
