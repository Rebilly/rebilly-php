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

class AchPlaidFeature implements JsonSerializable
{
    public const NAME_PLAID = 'Plaid';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
        if (array_key_exists('linkToken', $data)) {
            $this->setLinkToken($data['linkToken']);
        }
        if (array_key_exists('expirationTime', $data)) {
            $this->setExpirationTime($data['expirationTime']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @psalm-return self::NAME_*|null $name
     */
    public function getName(): ?string
    {
        return $this->fields['name'] ?? null;
    }

    /**
     * @psalm-param self::NAME_*|null $name
     */
    public function setName(null|string $name): self
    {
        $this->fields['name'] = $name;

        return $this;
    }

    public function getLinkToken(): ?string
    {
        return $this->fields['linkToken'] ?? null;
    }

    public function setLinkToken(null|string $linkToken): self
    {
        $this->fields['linkToken'] = $linkToken;

        return $this;
    }

    public function getExpirationTime(): ?DateTimeImmutable
    {
        return $this->fields['expirationTime'] ?? null;
    }

    public function setExpirationTime(null|DateTimeImmutable|string $expirationTime): self
    {
        if ($expirationTime !== null && !($expirationTime instanceof DateTimeImmutable)) {
            $expirationTime = new DateTimeImmutable($expirationTime);
        }

        $this->fields['expirationTime'] = $expirationTime;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('name', $this->fields)) {
            $data['name'] = $this->fields['name'];
        }
        if (array_key_exists('linkToken', $this->fields)) {
            $data['linkToken'] = $this->fields['linkToken'];
        }
        if (array_key_exists('expirationTime', $this->fields)) {
            $data['expirationTime'] = $this->fields['expirationTime']?->format(DateTimeInterface::RFC3339);
        }

        return $data;
    }
}
