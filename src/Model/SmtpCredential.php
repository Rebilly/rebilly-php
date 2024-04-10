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

class SmtpCredential implements ServiceCredential, JsonSerializable
{
    public const STATUS_ACTIVE = 'active';

    public const STATUS_INACTIVE = 'inactive';

    public const STATUS_DEACTIVATED = 'deactivated';

    public const ENCRYPTION_NONE = 'none';

    public const ENCRYPTION_TLS = 'tls';

    public const ENCRYPTION_SSL = 'ssl';

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
        if (array_key_exists('port', $data)) {
            $this->setPort($data['port']);
        }
        if (array_key_exists('encryption', $data)) {
            $this->setEncryption($data['encryption']);
        }
        if (array_key_exists('auth', $data)) {
            $this->setAuth($data['auth']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getType(): string
    {
        return 'smtp';
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

    public function setStatus(null|string $status): static
    {
        $this->fields['status'] = $status;

        return $this;
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

    public function getPort(): ?int
    {
        return $this->fields['port'] ?? null;
    }

    public function setPort(null|int $port): static
    {
        $this->fields['port'] = $port;

        return $this;
    }

    public function getEncryption(): ?string
    {
        return $this->fields['encryption'] ?? null;
    }

    public function setEncryption(null|string $encryption): static
    {
        $this->fields['encryption'] = $encryption;

        return $this;
    }

    public function getAuth(): ?SmtpAuthorization
    {
        return $this->fields['auth'] ?? null;
    }

    public function setAuth(null|SmtpAuthorization|array $auth): static
    {
        if ($auth !== null && !($auth instanceof SmtpAuthorization)) {
            $auth = SmtpAuthorizationFactory::from($auth);
        }

        $this->fields['auth'] = $auth;

        return $this;
    }

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'type' => 'smtp',
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
        if (array_key_exists('port', $this->fields)) {
            $data['port'] = $this->fields['port'];
        }
        if (array_key_exists('encryption', $this->fields)) {
            $data['encryption'] = $this->fields['encryption'];
        }
        if (array_key_exists('auth', $this->fields)) {
            $data['auth'] = $this->fields['auth']?->jsonSerialize();
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
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

    private function setDeactivationTime(null|DateTimeImmutable|string $deactivationTime): static
    {
        if ($deactivationTime !== null && !($deactivationTime instanceof DateTimeImmutable)) {
            $deactivationTime = new DateTimeImmutable($deactivationTime);
        }

        $this->fields['deactivationTime'] = $deactivationTime;

        return $this;
    }

    /**
     * @param null|array[]|ResourceLink[] $links
     */
    private function setLinks(null|array $links): static
    {
        $links = $links !== null ? array_map(
            fn ($value) => $value instanceof ResourceLink ? $value : ResourceLink::from($value),
            $links,
        ) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
