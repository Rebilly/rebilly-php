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

class CouponRestrictionRestrictToCustomerTags implements CouponRestriction, JsonSerializable
{
    public const REQUIRE_ALL_TAGS_TRUE = 'true';

    public const REQUIRE_ALL_TAGS_FALSE = 'false';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('tags', $data)) {
            $this->setTags($data['tags']);
        }
        if (array_key_exists('requireAllTags', $data)) {
            $this->setRequireAllTags($data['requireAllTags']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getType(): string
    {
        return 'restrict-to-customer-tags';
    }

    /**
     * @return string[]
     */
    public function getTags(): array
    {
        return $this->fields['tags'];
    }

    /**
     * @param string[] $tags
     */
    public function setTags(array $tags): static
    {
        $this->fields['tags'] = $tags;

        return $this;
    }

    public function getRequireAllTags(): bool
    {
        return $this->fields['requireAllTags'];
    }

    public function setRequireAllTags(bool $requireAllTags): static
    {
        $this->fields['requireAllTags'] = $requireAllTags;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'type' => 'restrict-to-customer-tags',
        ];
        if (array_key_exists('tags', $this->fields)) {
            $data['tags'] = $this->fields['tags'];
        }
        if (array_key_exists('requireAllTags', $this->fields)) {
            $data['requireAllTags'] = $this->fields['requireAllTags'];
        }

        return $data;
    }
}
