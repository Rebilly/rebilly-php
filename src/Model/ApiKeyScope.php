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

class ApiKeyScope implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('organizationId', $data)) {
            $this->setOrganizationId($data['organizationId']);
        }
        if (array_key_exists('productId', $data)) {
            $this->setProductId($data['productId']);
        }
        if (array_key_exists('planId', $data)) {
            $this->setPlanId($data['planId']);
        }
        if (array_key_exists('customFieldName', $data)) {
            $this->setCustomFieldName($data['customFieldName']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return null|string[]
     */
    public function getOrganizationId(): ?array
    {
        return $this->fields['organizationId'] ?? null;
    }

    /**
     * @param null|string[] $organizationId
     */
    public function setOrganizationId(null|array $organizationId): self
    {
        $organizationId = $organizationId !== null ? array_map(fn ($value) => $value ?? null, $organizationId) : null;

        $this->fields['organizationId'] = $organizationId;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getProductId(): ?array
    {
        return $this->fields['productId'] ?? null;
    }

    /**
     * @param null|string[] $productId
     */
    public function setProductId(null|array $productId): self
    {
        $productId = $productId !== null ? array_map(fn ($value) => $value ?? null, $productId) : null;

        $this->fields['productId'] = $productId;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getPlanId(): ?array
    {
        return $this->fields['planId'] ?? null;
    }

    /**
     * @param null|string[] $planId
     */
    public function setPlanId(null|array $planId): self
    {
        $planId = $planId !== null ? array_map(fn ($value) => $value ?? null, $planId) : null;

        $this->fields['planId'] = $planId;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getCustomFieldName(): ?array
    {
        return $this->fields['customFieldName'] ?? null;
    }

    /**
     * @param null|string[] $customFieldName
     */
    public function setCustomFieldName(null|array $customFieldName): self
    {
        $customFieldName = $customFieldName !== null ? array_map(fn ($value) => $value ?? null, $customFieldName) : null;

        $this->fields['customFieldName'] = $customFieldName;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('organizationId', $this->fields)) {
            $data['organizationId'] = $this->fields['organizationId'];
        }
        if (array_key_exists('productId', $this->fields)) {
            $data['productId'] = $this->fields['productId'];
        }
        if (array_key_exists('planId', $this->fields)) {
            $data['planId'] = $this->fields['planId'];
        }
        if (array_key_exists('customFieldName', $this->fields)) {
            $data['customFieldName'] = $this->fields['customFieldName'];
        }

        return $data;
    }
}
