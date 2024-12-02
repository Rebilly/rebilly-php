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

class RuleActionTagOrUntagCustomer extends RuleAction
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'name' => 'tag-or-untag-customer',
        ] + $data);

        if (array_key_exists('addingTags', $data)) {
            $this->setAddingTags($data['addingTags']);
        }
        if (array_key_exists('removingTags', $data)) {
            $this->setRemovingTags($data['removingTags']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return string[]
     */
    public function getAddingTags(): array
    {
        return $this->fields['addingTags'];
    }

    /**
     * @param string[] $addingTags
     */
    public function setAddingTags(array $addingTags): static
    {
        $this->fields['addingTags'] = $addingTags;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getRemovingTags(): array
    {
        return $this->fields['removingTags'];
    }

    /**
     * @param string[] $removingTags
     */
    public function setRemovingTags(array $removingTags): static
    {
        $this->fields['removingTags'] = $removingTags;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('addingTags', $this->fields)) {
            $data['addingTags'] = $this->fields['addingTags'];
        }
        if (array_key_exists('removingTags', $this->fields)) {
            $data['removingTags'] = $this->fields['removingTags'];
        }

        return parent::jsonSerialize() + $data;
    }
}
