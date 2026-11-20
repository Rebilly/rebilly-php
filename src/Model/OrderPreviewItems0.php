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

class OrderPreviewItems0 implements OrderPreviewItems
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('planId', $data)) {
            $this->setPlanId($data['planId']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getPlanId(): ?OrderPreviewItems0PlanId
    {
        return $this->fields['planId'] ?? null;
    }

    public function setPlanId(null|OrderPreviewItems0PlanId|array $planId): static
    {
        if ($planId !== null && !($planId instanceof OrderPreviewItems0PlanId)) {
            $planId = OrderPreviewItems0PlanId::from($planId);
        }

        $this->fields['planId'] = $planId;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('planId', $this->fields)) {
            $data['planId'] = $this->fields['planId']?->jsonSerialize();
        }

        return $data;
    }
}
