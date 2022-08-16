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

class MailgunCredential implements JsonSerializable
{
    public const STATUS_ACTIVE = 'active';

    public const STATUS_INACTIVE = 'inactive';

    public const STATUS_DEACTIVATED = 'deactivated';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('hash', $data)) {
            $this->setHash($data['hash']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('deactivationTime', $data)) {
            $this->setDeactivationTime($data['deactivationTime']);
        }
        if (array_key_exists('emailFrom', $data)) {
            $this->setEmailFrom($data['emailFrom']);
        }
        if (array_key_exists('apiKey', $data)) {
            $this->setApiKey($data['apiKey']);
        }
        if (array_key_exists('domain', $data)) {
            $this->setDomain($data['domain']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getHash(): ?string
    {
        return $this->fields['hash'] ?? null;
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

    public function getDeactivationTime(): ?DateTimeImmutable
    {
        return $this->fields['deactivationTime'] ?? null;
    }

    public function setDeactivationTime(null|DateTimeImmutable|string $deactivationTime): self
    {
        if ($deactivationTime !== null && !($deactivationTime instanceof DateTimeImmutable)) {
            $deactivationTime = new DateTimeImmutable($deactivationTime);
        }

        $this->fields['deactivationTime'] = $deactivationTime;

        return $this;
    }

    public function getEmailFrom(): string
    {
        return $this->fields['emailFrom'];
    }

    public function setEmailFrom(string $emailFrom): self
    {
        $this->fields['emailFrom'] = $emailFrom;

        return $this;
    }

    public function getApiKey(): string
    {
        return $this->fields['apiKey'];
    }

    public function setApiKey(string $apiKey): self
    {
        $this->fields['apiKey'] = $apiKey;

        return $this;
    }

    public function getDomain(): string
    {
        return $this->fields['domain'];
    }

    public function setDomain(string $domain): self
    {
        $this->fields['domain'] = $domain;

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
        if (array_key_exists('hash', $this->fields)) {
            $data['hash'] = $this->fields['hash'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('deactivationTime', $this->fields)) {
            $data['deactivationTime'] = $this->fields['deactivationTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('emailFrom', $this->fields)) {
            $data['emailFrom'] = $this->fields['emailFrom'];
        }
        if (array_key_exists('apiKey', $this->fields)) {
            $data['apiKey'] = $this->fields['apiKey'];
        }
        if (array_key_exists('domain', $this->fields)) {
            $data['domain'] = $this->fields['domain'];
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }

        return $data;
    }

    private function setHash(null|string $hash): self
    {
        $this->fields['hash'] = $hash;

        return $this;
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