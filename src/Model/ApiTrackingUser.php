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

use JsonSerializable;

class ApiTrackingUser implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('userId', $data)) {
            $this->setUserId($data['userId']);
        }
        if (array_key_exists('apiKeyId', $data)) {
            $this->setApiKeyId($data['apiKeyId']);
        }
        if (array_key_exists('email', $data)) {
            $this->setEmail($data['email']);
        }
        if (array_key_exists('firstName', $data)) {
            $this->setFirstName($data['firstName']);
        }
        if (array_key_exists('lastName', $data)) {
            $this->setLastName($data['lastName']);
        }
        if (array_key_exists('ipAddress', $data)) {
            $this->setIpAddress($data['ipAddress']);
        }
        if (array_key_exists('userAgent', $data)) {
            $this->setUserAgent($data['userAgent']);
        }
        if (array_key_exists('fingerprint', $data)) {
            $this->setFingerprint($data['fingerprint']);
        }
        if (array_key_exists('isSupport', $data)) {
            $this->setIsSupport($data['isSupport']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getUserId(): ?string
    {
        return $this->fields['userId'] ?? null;
    }

    public function setUserId(null|string $userId): self
    {
        $this->fields['userId'] = $userId;

        return $this;
    }

    public function getApiKeyId(): ?string
    {
        return $this->fields['apiKeyId'] ?? null;
    }

    public function setApiKeyId(null|string $apiKeyId): self
    {
        $this->fields['apiKeyId'] = $apiKeyId;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->fields['email'] ?? null;
    }

    public function setEmail(null|string $email): self
    {
        $this->fields['email'] = $email;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->fields['firstName'] ?? null;
    }

    public function setFirstName(null|string $firstName): self
    {
        $this->fields['firstName'] = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->fields['lastName'] ?? null;
    }

    public function setLastName(null|string $lastName): self
    {
        $this->fields['lastName'] = $lastName;

        return $this;
    }

    public function getIpAddress(): ?string
    {
        return $this->fields['ipAddress'] ?? null;
    }

    public function setIpAddress(null|string $ipAddress): self
    {
        $this->fields['ipAddress'] = $ipAddress;

        return $this;
    }

    public function getUserAgent(): ?string
    {
        return $this->fields['userAgent'] ?? null;
    }

    public function setUserAgent(null|string $userAgent): self
    {
        $this->fields['userAgent'] = $userAgent;

        return $this;
    }

    public function getFingerprint(): ?string
    {
        return $this->fields['fingerprint'] ?? null;
    }

    public function setFingerprint(null|string $fingerprint): self
    {
        $this->fields['fingerprint'] = $fingerprint;

        return $this;
    }

    public function getIsSupport(): ?bool
    {
        return $this->fields['isSupport'] ?? null;
    }

    public function setIsSupport(null|bool $isSupport): self
    {
        $this->fields['isSupport'] = $isSupport;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('userId', $this->fields)) {
            $data['userId'] = $this->fields['userId'];
        }
        if (array_key_exists('apiKeyId', $this->fields)) {
            $data['apiKeyId'] = $this->fields['apiKeyId'];
        }
        if (array_key_exists('email', $this->fields)) {
            $data['email'] = $this->fields['email'];
        }
        if (array_key_exists('firstName', $this->fields)) {
            $data['firstName'] = $this->fields['firstName'];
        }
        if (array_key_exists('lastName', $this->fields)) {
            $data['lastName'] = $this->fields['lastName'];
        }
        if (array_key_exists('ipAddress', $this->fields)) {
            $data['ipAddress'] = $this->fields['ipAddress'];
        }
        if (array_key_exists('userAgent', $this->fields)) {
            $data['userAgent'] = $this->fields['userAgent'];
        }
        if (array_key_exists('fingerprint', $this->fields)) {
            $data['fingerprint'] = $this->fields['fingerprint'];
        }
        if (array_key_exists('isSupport', $this->fields)) {
            $data['isSupport'] = $this->fields['isSupport'];
        }

        return $data;
    }
}
