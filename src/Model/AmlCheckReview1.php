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

class AmlCheckReview1 implements AmlCheckReview
{
    use HasMetadata;

    public const STATUS_CONFIRMED_MATCH = 'confirmed-match';

    public const STATUS_FALSE_POSITIVE = 'false-positive';

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('hits', $data)) {
            $this->setHits($data['hits']);
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

    /**
     * @return AmlHitDecision[]
     */
    public function getHits(): array
    {
        return $this->fields['hits'];
    }

    /**
     * @param AmlHitDecision[]|array[] $hits
     */
    public function setHits(array $hits): static
    {
        $hits = array_map(
            fn ($value) => $value instanceof AmlHitDecision ? $value : AmlHitDecision::from($value),
            $hits,
        );

        $this->fields['hits'] = $hits;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('hits', $this->fields)) {
            $data['hits'] = array_map(
                static fn (AmlHitDecision $amlHitDecision) => $amlHitDecision->jsonSerialize(),
                $this->fields['hits'],
            );
        }

        return $data;
    }
}
