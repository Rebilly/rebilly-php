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

class AmlCheckProvenance implements JsonSerializable
{
    public const SCOPE_STATUS_ONLY = 'status-only';

    public const REASONS_DUPLICATED_BY_PERSON_EXACT_MATCH = 'customer_duplicated_by_person_exact_match';

    public const REASONS_DUPLICATED_BY_PRIMARY_PHONE_NUMBER_EXACT_MATCH = 'customer_duplicated_by_primary_phone_number_exact_match';

    public const REASONS_PREVIOUS_CHECK_EXACT_MATCH = 'customer_previous_check_exact_match';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('inherited', $data)) {
            $this->setInherited($data['inherited']);
        }
        if (array_key_exists('inheritedFromAmlCheckId', $data)) {
            $this->setInheritedFromAmlCheckId($data['inheritedFromAmlCheckId']);
        }
        if (array_key_exists('scope', $data)) {
            $this->setScope($data['scope']);
        }
        if (array_key_exists('reasons', $data)) {
            $this->setReasons($data['reasons']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getInherited(): ?bool
    {
        return $this->fields['inherited'] ?? null;
    }

    public function setInherited(null|bool $inherited): static
    {
        $this->fields['inherited'] = $inherited;

        return $this;
    }

    public function getInheritedFromAmlCheckId(): ?string
    {
        return $this->fields['inheritedFromAmlCheckId'] ?? null;
    }

    public function setInheritedFromAmlCheckId(null|string $inheritedFromAmlCheckId): static
    {
        $this->fields['inheritedFromAmlCheckId'] = $inheritedFromAmlCheckId;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getScope(): ?array
    {
        return $this->fields['scope'] ?? null;
    }

    /**
     * @param null|string[] $scope
     */
    public function setScope(null|array $scope): static
    {
        $this->fields['scope'] = $scope;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getReasons(): ?array
    {
        return $this->fields['reasons'] ?? null;
    }

    /**
     * @param null|string[] $reasons
     */
    public function setReasons(null|array $reasons): static
    {
        $this->fields['reasons'] = $reasons;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('inherited', $this->fields)) {
            $data['inherited'] = $this->fields['inherited'];
        }
        if (array_key_exists('inheritedFromAmlCheckId', $this->fields)) {
            $data['inheritedFromAmlCheckId'] = $this->fields['inheritedFromAmlCheckId'];
        }
        if (array_key_exists('scope', $this->fields)) {
            $data['scope'] = $this->fields['scope'];
        }
        if (array_key_exists('reasons', $this->fields)) {
            $data['reasons'] = $this->fields['reasons'];
        }

        return $data;
    }
}
