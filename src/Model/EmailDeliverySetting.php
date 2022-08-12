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

class EmailDeliverySetting implements JsonSerializable
{
    public const STATUS_PENDING = 'pending';

    public const STATUS_VERIFIED = 'verified';

    public const PROVIDER_REBILLY = 'rebilly';

    public const PROVIDER_SMTP = 'smtp';

    public const PROVIDER_AWS_SES = 'aws-ses';

    public const PROVIDER_MAILGUN = 'mailgun';

    public const PROVIDER_POSTMARK = 'postmark';

    public const PROVIDER_SENDGRID = 'sendgrid';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('from', $data)) {
            $this->setFrom($data['from']);
        }
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('credentialId', $data)) {
            $this->setCredentialId($data['credentialId']);
        }
        if (array_key_exists('provider', $data)) {
            $this->setProvider($data['provider']);
        }
        if (array_key_exists('isDefault', $data)) {
            $this->setIsDefault($data['isDefault']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
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

    public function getFrom(): string
    {
        return $this->fields['from'];
    }

    public function setFrom(string $from): self
    {
        $this->fields['from'] = $from;

        return $this;
    }

    public function getName(): string
    {
        return $this->fields['name'];
    }

    public function setName(string $name): self
    {
        $this->fields['name'] = $name;

        return $this;
    }

    /**
     * @psalm-return self::STATUS_*|null $status
     */
    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    public function getCredentialId(): ?string
    {
        return $this->fields['credentialId'] ?? null;
    }

    public function setCredentialId(null|string $credentialId): self
    {
        $this->fields['credentialId'] = $credentialId;

        return $this;
    }

    /**
     * @psalm-return self::PROVIDER_*|null $provider
     */
    public function getProvider(): ?string
    {
        return $this->fields['provider'] ?? null;
    }

    public function getIsDefault(): ?bool
    {
        return $this->fields['isDefault'] ?? null;
    }

    public function setIsDefault(null|bool $isDefault): self
    {
        $this->fields['isDefault'] = $isDefault;

        return $this;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function setCreatedTime(null|DateTimeImmutable|string $createdTime): self
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

        return $this;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('from', $this->fields)) {
            $data['from'] = $this->fields['from'];
        }
        if (array_key_exists('name', $this->fields)) {
            $data['name'] = $this->fields['name'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('credentialId', $this->fields)) {
            $data['credentialId'] = $this->fields['credentialId'];
        }
        if (array_key_exists('provider', $this->fields)) {
            $data['provider'] = $this->fields['provider'];
        }
        if (array_key_exists('isDefault', $this->fields)) {
            $data['isDefault'] = $this->fields['isDefault'];
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }

        return $data;
    }

    private function setId(null|string $id): self
    {
        $this->fields['id'] = $id;

        return $this;
    }

    /**
     * @psalm-param self::STATUS_*|null $status
     */
    private function setStatus(null|string $status): self
    {
        $this->fields['status'] = $status;

        return $this;
    }

    /**
     * @psalm-param self::PROVIDER_*|null $provider
     */
    private function setProvider(null|string $provider): self
    {
        $this->fields['provider'] = $provider;

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
}
