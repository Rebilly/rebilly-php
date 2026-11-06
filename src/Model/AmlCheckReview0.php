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

class AmlCheckReview0 implements AmlCheckReview
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

    public function getStatus(): string
    {
        return $this->fields['status'];
    }

    public function setStatus(string $status): static
    {
        $this->fields['status'] = $status;

        return $this;
    }

    /**
     * @return null|AmlHitDecision[]
     */
    public function getHits(): ?array
    {
        return $this->fields['hits'] ?? null;
    }

    /**
     * @param null|AmlHitDecision[]|array[] $hits
     */
    public function setHits(null|array $hits): static
    {
        $hits = $hits !== null ? array_map(
            fn ($value) => $value instanceof AmlHitDecision ? $value : AmlHitDecision::from($value),
            $hits,
        ) : null;

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
            $data['hits'] = $this->fields['hits'] !== null
                ? array_map(
                    static fn (AmlHitDecision $amlHitDecision) => $amlHitDecision->jsonSerialize(),
                    $this->fields['hits'],
                )
                : null;
        }

        return $data;
    }
}
