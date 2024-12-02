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

class AmlCheckReview implements JsonSerializable
{
    public const TAG_CONFIRMED = 'aml-match-confirmed';

    public const TAG_FALSE_POSITIVE = 'aml-match-false-positive';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('tag', $data)) {
            $this->setTag($data['tag']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getTag(): ?string
    {
        return $this->fields['tag'] ?? null;
    }

    public function setTag(null|string $tag): static
    {
        $this->fields['tag'] = $tag;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('tag', $this->fields)) {
            $data['tag'] = $this->fields['tag'];
        }

        return $data;
    }
}
