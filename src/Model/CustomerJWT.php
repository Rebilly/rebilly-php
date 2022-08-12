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

class CustomerJWT implements JsonSerializable
{
    public const TYPE_CUSTOMER = 'customer';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('token', $data)) {
            $this->setToken($data['token']);
        }
        if (array_key_exists('invalidate', $data)) {
            $this->setInvalidate($data['invalidate']);
        }
        if (array_key_exists('oneTimePassword', $data)) {
            $this->setOneTimePassword($data['oneTimePassword']);
        }
        if (array_key_exists('customerId', $data)) {
            $this->setCustomerId($data['customerId']);
        }
        if (array_key_exists('acl', $data)) {
            $this->setAcl($data['acl']);
        }
        if (array_key_exists('customClaims', $data)) {
            $this->setCustomClaims($data['customClaims']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
        if (array_key_exists('expiredTime', $data)) {
            $this->setExpiredTime($data['expiredTime']);
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

    /**
     * @psalm-return self::TYPE_*|null $type
     */
    public function getType(): ?string
    {
        return $this->fields['type'] ?? null;
    }

    public function getToken(): ?string
    {
        return $this->fields['token'] ?? null;
    }

    public function getInvalidate(): ?bool
    {
        return $this->fields['invalidate'] ?? null;
    }

    public function setInvalidate(null|bool $invalidate): self
    {
        $this->fields['invalidate'] = $invalidate;

        return $this;
    }

    public function getOneTimePassword(): ?string
    {
        return $this->fields['oneTimePassword'] ?? null;
    }

    public function setOneTimePassword(null|string $oneTimePassword): self
    {
        $this->fields['oneTimePassword'] = $oneTimePassword;

        return $this;
    }

    public function getCustomerId(): ?string
    {
        return $this->fields['customerId'] ?? null;
    }

    /**
     * @return null|\Rebilly\Sdk\Model\Acl[]
     */
    public function getAcl(): ?array
    {
        return $this->fields['acl'] ?? null;
    }

    /**
     * @param null|\Rebilly\Sdk\Model\Acl[] $acl
     */
    public function setAcl(null|array $acl): self
    {
        $acl = $acl !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof \Rebilly\Sdk\Model\Acl ? $value : \Rebilly\Sdk\Model\Acl::from($value)) : null, $acl) : null;

        $this->fields['acl'] = $acl;

        return $this;
    }

    /**
     * @return null|array<string,object>
     */
    public function getCustomClaims(): ?array
    {
        return $this->fields['customClaims'] ?? null;
    }

    /**
     * @param null|array<string,object> $customClaims
     */
    public function setCustomClaims(null|array $customClaims): self
    {
        $this->fields['customClaims'] = $customClaims;

        return $this;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    public function getExpiredTime(): ?DateTimeImmutable
    {
        return $this->fields['expiredTime'] ?? null;
    }

    public function setExpiredTime(null|DateTimeImmutable|string $expiredTime): self
    {
        if ($expiredTime !== null && !($expiredTime instanceof DateTimeImmutable)) {
            $expiredTime = new DateTimeImmutable($expiredTime);
        }

        $this->fields['expiredTime'] = $expiredTime;

        return $this;
    }

    /**
     * @return null|\Rebilly\Sdk\Model\CustomerLink[]
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
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('token', $this->fields)) {
            $data['token'] = $this->fields['token'];
        }
        if (array_key_exists('invalidate', $this->fields)) {
            $data['invalidate'] = $this->fields['invalidate'];
        }
        if (array_key_exists('oneTimePassword', $this->fields)) {
            $data['oneTimePassword'] = $this->fields['oneTimePassword'];
        }
        if (array_key_exists('customerId', $this->fields)) {
            $data['customerId'] = $this->fields['customerId'];
        }
        if (array_key_exists('acl', $this->fields)) {
            $data['acl'] = $this->fields['acl'];
        }
        if (array_key_exists('customClaims', $this->fields)) {
            $data['customClaims'] = $this->fields['customClaims'];
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('expiredTime', $this->fields)) {
            $data['expiredTime'] = $this->fields['expiredTime']?->format(DateTimeInterface::RFC3339);
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

    /**
     * @psalm-param self::TYPE_*|null $type
     */
    private function setType(null|string $type): self
    {
        $this->fields['type'] = $type;

        return $this;
    }

    private function setToken(null|string $token): self
    {
        $this->fields['token'] = $token;

        return $this;
    }

    private function setCustomerId(null|string $customerId): self
    {
        $this->fields['customerId'] = $customerId;

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

    private function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): self
    {
        if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

        return $this;
    }

    /**
     * @param null|\Rebilly\Sdk\Model\CustomerLink[] $links
     */
    private function setLinks(null|array $links): self
    {
        $links = $links !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof \Rebilly\Sdk\Model\CustomerLink ? $value : \Rebilly\Sdk\Model\CustomerLink::from($value)) : null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
