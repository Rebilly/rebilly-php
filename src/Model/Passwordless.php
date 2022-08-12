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

class Passwordless extends AuthenticationToken
{
    public const MODE_PASSWORDLESS = 'passwordless';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'mode' => 'passwordless',
        ] + $data);

        if (array_key_exists('customerId', $data)) {
            $this->setCustomerId($data['customerId']);
        }
        if (array_key_exists('mode', $data)) {
            $this->setMode($data['mode']);
        }
        if (array_key_exists('expiredTime', $data)) {
            $this->setExpiredTime($data['expiredTime']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
        if (array_key_exists('token', $data)) {
            $this->setToken($data['token']);
        }
        if (array_key_exists('otpRequired', $data)) {
            $this->setOtpRequired($data['otpRequired']);
        }
        if (array_key_exists('credentialId', $data)) {
            $this->setCredentialId($data['credentialId']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCustomerId(): string
    {
        return $this->fields['customerId'];
    }

    public function setCustomerId(string $customerId): self
    {
        $this->fields['customerId'] = $customerId;

        return $this;
    }

    /**
     * @psalm-return self::MODE_*|null $mode
     */
    public function getMode(): ?string
    {
        return $this->fields['mode'] ?? null;
    }

    /**
     * @psalm-param self::MODE_*|null $mode
     */
    public function setMode(null|string $mode): self
    {
        $this->fields['mode'] = $mode;

        return $this;
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
     * @return null|\Rebilly\Sdk\Model\SelfLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function getToken(): ?string
    {
        return $this->fields['token'] ?? null;
    }

    public function getOtpRequired(): ?bool
    {
        return $this->fields['otpRequired'] ?? null;
    }

    public function setOtpRequired(null|bool $otpRequired): self
    {
        $this->fields['otpRequired'] = $otpRequired;

        return $this;
    }

    public function getCredentialId(): ?string
    {
        return $this->fields['credentialId'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('customerId', $this->fields)) {
            $data['customerId'] = $this->fields['customerId'];
        }
        if (array_key_exists('mode', $this->fields)) {
            $data['mode'] = $this->fields['mode'];
        }
        if (array_key_exists('expiredTime', $this->fields)) {
            $data['expiredTime'] = $this->fields['expiredTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }
        if (array_key_exists('token', $this->fields)) {
            $data['token'] = $this->fields['token'];
        }
        if (array_key_exists('otpRequired', $this->fields)) {
            $data['otpRequired'] = $this->fields['otpRequired'];
        }
        if (array_key_exists('credentialId', $this->fields)) {
            $data['credentialId'] = $this->fields['credentialId'];
        }

        return parent::jsonSerialize() + $data;
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

    private function setToken(null|string $token): self
    {
        $this->fields['token'] = $token;

        return $this;
    }

    private function setCredentialId(null|string $credentialId): self
    {
        $this->fields['credentialId'] = $credentialId;

        return $this;
    }
}
