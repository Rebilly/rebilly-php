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
use Rebilly\Sdk\Trait\HasMetadata;

class CustomDomain implements JsonSerializable
{
    use HasMetadata;

    public const PURPOSE_HOSTED_PAGES = 'hosted-pages';

    public const PURPOSE_MEDIA = 'media';

    public const VERIFICATION_FAILURE_CERTIFICATE_FAILED = 'certificate-failed';

    public const VERIFICATION_FAILURE_HOSTNAME_TAKEN = 'hostname-taken';

    public const VERIFICATION_FAILURE_CNAME_MISSING = 'cname-missing';

    public const VERIFICATION_FAILURE_NULL = 'null';

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('domain', $data)) {
            $this->setDomain($data['domain']);
        }
        if (array_key_exists('purpose', $data)) {
            $this->setPurpose($data['purpose']);
        }
        if (array_key_exists('isVerified', $data)) {
            $this->setIsVerified($data['isVerified']);
        }
        if (array_key_exists('verificationFailure', $data)) {
            $this->setVerificationFailure($data['verificationFailure']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function getDomain(): string
    {
        return $this->fields['domain'];
    }

    public function setDomain(string $domain): static
    {
        $this->fields['domain'] = $domain;

        return $this;
    }

    public function getPurpose(): ?string
    {
        return $this->fields['purpose'] ?? null;
    }

    public function setPurpose(null|string $purpose): static
    {
        $this->fields['purpose'] = $purpose;

        return $this;
    }

    public function getIsVerified(): ?bool
    {
        return $this->fields['isVerified'] ?? null;
    }

    public function getVerificationFailure(): ?string
    {
        return $this->fields['verificationFailure'] ?? null;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
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
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('domain', $this->fields)) {
            $data['domain'] = $this->fields['domain'];
        }
        if (array_key_exists('purpose', $this->fields)) {
            $data['purpose'] = $this->fields['purpose'];
        }
        if (array_key_exists('isVerified', $this->fields)) {
            $data['isVerified'] = $this->fields['isVerified'];
        }
        if (array_key_exists('verificationFailure', $this->fields)) {
            $data['verificationFailure'] = $this->fields['verificationFailure'];
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'] !== null
                ? array_map(
                    static fn (ResourceLink $resourceLink) => $resourceLink->jsonSerialize(),
                    $this->fields['_links'],
                )
                : null;
        }

        return $data;
    }

    private function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setIsVerified(null|bool $isVerified): static
    {
        $this->fields['isVerified'] = $isVerified;

        return $this;
    }

    private function setVerificationFailure(null|string $verificationFailure): static
    {
        $this->fields['verificationFailure'] = $verificationFailure;

        return $this;
    }

    private function setCreatedTime(null|DateTimeImmutable|string $createdTime): static
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

        return $this;
    }

    private function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): static
    {
        if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

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
