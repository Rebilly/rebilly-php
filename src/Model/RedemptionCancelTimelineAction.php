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

class RedemptionCancelTimelineAction implements TimelineAction, JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('redemptionId', $data)) {
            $this->setRedemptionId($data['redemptionId']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
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
