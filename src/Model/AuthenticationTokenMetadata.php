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

class AuthenticationTokenMetadata implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
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
     * @return null|SelfLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('expiredTime', $this->fields)) {
            $data['expiredTime'] = $this->fields['expiredTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }

        return $data;
    }

    /**
     * @param null|SelfLink[] $links
     */
    private function setLinks(null|array $links): self
    {
        $links = $links !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof SelfLink ? $value : SelfLink::from($value)) : null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
