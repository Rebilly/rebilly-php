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

use DateTimeImmutable;
use DateTimeInterface;
use JsonSerializable;

class CouponRedemption implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('couponId', $data)) {
            $this->setCouponId($data['couponId']);
        }
        if (array_key_exists('customerId', $data)) {
            $this->setCustomerId($data['customerId']);
        }
        if (array_key_exists('additionalRestrictions', $data)) {
            $this->setAdditionalRestrictions($data['additionalRestrictions']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('canceledTime', $data)) {
            $this->setCanceledTime($data['canceledTime']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
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

    public function getCouponId(): ?string
    {
        return $this->fields['couponId'] ?? null;
    }

    public function setCouponId(null|string $couponId): self
    {
        $this->fields['couponId'] = $couponId;

        return $this;
    }

    public function getCustomerId(): ?string
    {
        return $this->fields['customerId'] ?? null;
    }

    public function setCustomerId(null|string $customerId): self
    {
        $this->fields['customerId'] = $customerId;

        return $this;
    }

    /**
     * @return null|\Rebilly\Sdk\Model\RedemptionRestriction[]
     */
    public function getAdditionalRestrictions(): ?array
    {
        return $this->fields['additionalRestrictions'] ?? null;
    }

    /**
     * @param null|\Rebilly\Sdk\Model\RedemptionRestriction[] $additionalRestrictions
     */
    public function setAdditionalRestrictions(null|array $additionalRestrictions): self
    {
        $additionalRestrictions = $additionalRestrictions !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof \Rebilly\Sdk\Model\RedemptionRestriction ? $value : \Rebilly\Sdk\Model\RedemptionRestriction::from($value)) : null, $additionalRestrictions) : null;

        $this->fields['additionalRestrictions'] = $additionalRestrictions;

        return $this;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function getCanceledTime(): ?DateTimeImmutable
    {
        return $this->fields['canceledTime'] ?? null;
    }

    /**
     * @return null|\Rebilly\Sdk\Model\SelfLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('couponId', $this->fields)) {
            $data['couponId'] = $this->fields['couponId'];
        }
        if (array_key_exists('customerId', $this->fields)) {
            $data['customerId'] = $this->fields['customerId'];
        }
        if (array_key_exists('additionalRestrictions', $this->fields)) {
            $data['additionalRestrictions'] = $this->fields['additionalRestrictions'];
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('canceledTime', $this->fields)) {
            $data['canceledTime'] = $this->fields['canceledTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }

        return $data;
    }

    private function setId(null|string $id): self
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setCreatedTime(null|DateTimeImmutable|string $createdTime): self
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

        return $this;
    }

    private function setCanceledTime(null|DateTimeImmutable|string $canceledTime): self
    {
        if ($canceledTime !== null && !($canceledTime instanceof DateTimeImmutable)) {
            $canceledTime = new DateTimeImmutable($canceledTime);
        }

        $this->fields['canceledTime'] = $canceledTime;

        return $this;
    }

    /**
     * @param null|\Rebilly\Sdk\Model\SelfLink[] $links
     */
    private function setLinks(null|array $links): self
    {
        $links = $links !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof \Rebilly\Sdk\Model\SelfLink ? $value : \Rebilly\Sdk\Model\SelfLink::from($value)) : null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
