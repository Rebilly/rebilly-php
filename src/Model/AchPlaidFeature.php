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

    public function getName(): ?PlaidFeatureName
    {
        return $this->fields['name'] ?? null;
    }

    public function setName(null|PlaidFeatureName|string $name): self
    {
        if ($name !== null && !($name instanceof \Rebilly\Sdk\Model\PlaidFeatureName)) {
            $name = \Rebilly\Sdk\Model\PlaidFeatureName::from($name);
        }

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
            $data['name'] = $this->fields['name']?->value;
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
