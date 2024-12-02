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

class TimelineExtraDataLinks implements JsonSerializable
{
    public const RESOURCE_TYPE_KYC_DOCUMENT = 'kyc-document';

    public const RESOURCE_TYPE_INVOICE = 'invoice';

    public const RESOURCE_TYPE_SUBSCRIPTION = 'subscription';

    public const RESOURCE_TYPE_TRANSACTION = 'transaction';

    public const RESOURCE_TYPE_EMAIL_MESSAGE = 'email-message';

    public const RESOURCE_TYPE_DISPUTE = 'dispute';

    public const RESOURCE_TYPE_COUPON = 'coupon';

    public const RESOURCE_TYPE_EXTERNAL = 'external';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('resourceType', $data)) {
            $this->setResourceType($data['resourceType']);
        }
        if (array_key_exists('resourceId', $data)) {
            $this->setResourceId($data['resourceId']);
        }
        if (array_key_exists('placeholder', $data)) {
            $this->setPlaceholder($data['placeholder']);
        }
        if (array_key_exists('externalUrl', $data)) {
            $this->setExternalUrl($data['externalUrl']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getResourceType(): ?string
    {
        return $this->fields['resourceType'] ?? null;
    }

    public function setResourceType(null|string $resourceType): static
    {
        $this->fields['resourceType'] = $resourceType;

        return $this;
    }

    public function getResourceId(): ?string
    {
        return $this->fields['resourceId'] ?? null;
    }

    public function setResourceId(null|string $resourceId): static
    {
        $this->fields['resourceId'] = $resourceId;

        return $this;
    }

    public function getPlaceholder(): ?string
    {
        return $this->fields['placeholder'] ?? null;
    }

    public function setPlaceholder(null|string $placeholder): static
    {
        $this->fields['placeholder'] = $placeholder;

        return $this;
    }

    public function getExternalUrl(): ?string
    {
        return $this->fields['externalUrl'] ?? null;
    }

    public function setExternalUrl(null|string $externalUrl): static
    {
        $this->fields['externalUrl'] = $externalUrl;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('resourceType', $this->fields)) {
            $data['resourceType'] = $this->fields['resourceType'];
        }
        if (array_key_exists('resourceId', $this->fields)) {
            $data['resourceId'] = $this->fields['resourceId'];
        }
        if (array_key_exists('placeholder', $this->fields)) {
            $data['placeholder'] = $this->fields['placeholder'];
        }
        if (array_key_exists('externalUrl', $this->fields)) {
            $data['externalUrl'] = $this->fields['externalUrl'];
        }

        return $data;
    }
}
