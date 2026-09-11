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

class OrderPreviewItems1 implements OrderPreviewItems
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('plan', $data)) {
            $this->setPlan($data['plan']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getPlan(): ?OrderPreviewItems1Plan
    {
        return $this->fields['plan'] ?? null;
    }

    public function setPlan(null|OrderPreviewItems1Plan|array $plan): static
    {
        if ($plan !== null && !($plan instanceof OrderPreviewItems1Plan)) {
            $plan = OrderPreviewItems1Plan::from($plan);
        }

        $this->fields['plan'] = $plan;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('plan', $this->fields)) {
            $data['plan'] = $this->fields['plan']?->jsonSerialize();
        }

        return $data;
    }
}
