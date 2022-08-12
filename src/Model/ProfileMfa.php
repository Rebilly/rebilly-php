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

class ProfileMfa implements JsonSerializable
{
    public const STATUS_ACTIVE = 'active';

    public const STATUS_INACTIVE = 'inactive';

    public const TYPE_DUO = 'duo';

    public const TYPE_GUARDIAN = 'guardian';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('lastAuthTime', $data)) {
            $this->setLastAuthTime($data['lastAuthTime']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @psalm-return self::STATUS_*|null $status
     */
    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    /**
     * @psalm-param self::STATUS_*|null $status
     */
    public function setStatus(null|string $status): self
    {
        $this->fields['status'] = $status;

        return $this;
    }

    /**
     * @psalm-return self::TYPE_*|null $type
     */
    public function getType(): ?string
    {
        return $this->fields['type'] ?? null;
    }

    /**
     * @psalm-param self::TYPE_*|null $type
     */
    public function setType(null|string $type): self
    {
        $this->fields['type'] = $type;

        return $this;
    }

    public function getLastAuthTime(): ?DateTimeImmutable
    {
        return $this->fields['lastAuthTime'] ?? null;
    }

    public function setLastAuthTime(null|DateTimeImmutable|string $lastAuthTime): self
    {
        if ($lastAuthTime !== null && !($lastAuthTime instanceof DateTimeImmutable)) {
            $lastAuthTime = new DateTimeImmutable($lastAuthTime);
        }

        $this->fields['lastAuthTime'] = $lastAuthTime;

        return $this;
    }

    /**
     * @return null|array<\Rebilly\Sdk\Model\EnrollmentLink|\Rebilly\Sdk\Model\SelfLink>
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('lastAuthTime', $this->fields)) {
            $data['lastAuthTime'] = $this->fields['lastAuthTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }

        return $data;
    }

    /**
     * @param null|array<\Rebilly\Sdk\Model\EnrollmentLink|\Rebilly\Sdk\Model\SelfLink> $links
     */
    private function setLinks(null|array $links): self
    {
        $links = $links !== null ? array_map(fn ($value) => $value ?? null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
