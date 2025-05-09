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

class WebhookCredential implements ServiceCredential
{
    public const STATUS_ACTIVE = 'active';

    public const STATUS_INACTIVE = 'inactive';

    public const STATUS_DEACTIVATED = 'deactivated';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('hash', $data)) {
            $this->setHash($data['hash']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('deactivationTime', $data)) {
            $this->setDeactivationTime($data['deactivationTime']);
        }
        if (array_key_exists('host', $data)) {
            $this->setHost($data['host']);
        }
        if (array_key_exists('auth', $data)) {
            $this->setAuth($data['auth']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getType(): string
    {
        return 'webhook';
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function getHash(): ?string
    {
        return $this->fields['hash'] ?? null;
    }

    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    public function getDeactivationTime(): ?DateTimeImmutable
    {
        return $this->fields['deactivationTime'] ?? null;
    }

    public function getHost(): string
    {
        return $this->fields['host'];
    }

    public function setHost(string $host): static
    {
        $this->fields['host'] = $host;

        return $this;
    }

    public function getAuth(): ?WebhookAuthorization
    {
        return $this->fields['auth'] ?? null;
    }

    public function setAuth(null|WebhookAuthorization|array $auth): static
    {
        if ($auth !== null && !($auth instanceof WebhookAuthorization)) {
            $auth = WebhookAuthorizationFactory::from($auth);
        }

        $this->fields['auth'] = $auth;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'type' => 'webhook',
        ];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('hash', $this->fields)) {
            $data['hash'] = $this->fields['hash'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('deactivationTime', $this->fields)) {
            $data['deactivationTime'] = $this->fields['deactivationTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('host', $this->fields)) {
            $data['host'] = $this->fields['host'];
        }
        if (array_key_exists('auth', $this->fields)) {
            $data['auth'] = $this->fields['auth']?->jsonSerialize();
        }

        return $data;
    }

    private function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setHash(null|string $hash): static
    {
        $this->fields['hash'] = $hash;

        return $this;
    }

    private function setStatus(null|string $status): static
    {
        $this->fields['status'] = $status;

        return $this;
    }

    private function setDeactivationTime(null|DateTimeImmutable|string $deactivationTime): static
    {
        if ($deactivationTime !== null && !($deactivationTime instanceof DateTimeImmutable)) {
            $deactivationTime = new DateTimeImmutable($deactivationTime);
        }

        $this->fields['deactivationTime'] = $deactivationTime;

        return $this;
    }
}
