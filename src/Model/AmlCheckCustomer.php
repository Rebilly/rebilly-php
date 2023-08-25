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

class AmlCheckCustomer implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('primaryAddress', $data)) {
            $this->setPrimaryAddress($data['primaryAddress']);
        }
        if (array_key_exists('tags', $data)) {
            $this->setTags($data['tags']);
        }
        if (array_key_exists('organizationId', $data)) {
            $this->setOrganizationId($data['organizationId']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    public function getPrimaryAddress(): ?AmlCheckCustomerPrimaryAddress
    {
        return $this->fields['primaryAddress'] ?? null;
    }

    public function setPrimaryAddress(null|AmlCheckCustomerPrimaryAddress|array $primaryAddress): static
    {
        if ($primaryAddress !== null && !($primaryAddress instanceof AmlCheckCustomerPrimaryAddress)) {
            $primaryAddress = AmlCheckCustomerPrimaryAddress::from($primaryAddress);
        }

        $this->fields['primaryAddress'] = $primaryAddress;

        return $this;
    }

    /**
     * @return null|Tag[]
     */
    public function getTags(): ?array
    {
        return $this->fields['tags'] ?? null;
    }

    /**
     * @param null|array[]|Tag[] $tags
     */
    public function setTags(null|array $tags): static
    {
        $tags = $tags !== null ? array_map(
            fn ($value) => $value !== null ? ($value instanceof Tag ? $value : Tag::from($value)) : null,
            $tags,
        ) : null;

        $this->fields['tags'] = $tags;

        return $this;
    }

    public function getOrganizationId(): ?string
    {
        return $this->fields['organizationId'] ?? null;
    }

    public function setOrganizationId(null|string $organizationId): static
    {
        $this->fields['organizationId'] = $organizationId;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('primaryAddress', $this->fields)) {
            $data['primaryAddress'] = $this->fields['primaryAddress']?->jsonSerialize();
        }
        if (array_key_exists('tags', $this->fields)) {
            $data['tags'] = $this->fields['tags'];
        }
        if (array_key_exists('organizationId', $this->fields)) {
            $data['organizationId'] = $this->fields['organizationId'];
        }

        return $data;
    }
}
