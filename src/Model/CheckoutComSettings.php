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

class CheckoutComSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('markAsWaitingGatewayOnPendingPayout', $data)) {
            $this->setMarkAsWaitingGatewayOnPendingPayout($data['markAsWaitingGatewayOnPendingPayout']);
        }
        if (array_key_exists('subEntityIdWebsiteCustomField', $data)) {
            $this->setSubEntityIdWebsiteCustomField($data['subEntityIdWebsiteCustomField']);
        }
        if (array_key_exists('processingChannelId', $data)) {
            $this->setProcessingChannelId($data['processingChannelId']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMarkAsWaitingGatewayOnPendingPayout(): ?bool
    {
        return $this->fields['markAsWaitingGatewayOnPendingPayout'] ?? null;
    }

    public function setMarkAsWaitingGatewayOnPendingPayout(null|bool $markAsWaitingGatewayOnPendingPayout): static
    {
        $this->fields['markAsWaitingGatewayOnPendingPayout'] = $markAsWaitingGatewayOnPendingPayout;

        return $this;
    }

    public function getSubEntityIdWebsiteCustomField(): ?string
    {
        return $this->fields['subEntityIdWebsiteCustomField'] ?? null;
    }

    public function setSubEntityIdWebsiteCustomField(null|string $subEntityIdWebsiteCustomField): static
    {
        $this->fields['subEntityIdWebsiteCustomField'] = $subEntityIdWebsiteCustomField;

        return $this;
    }

    public function getProcessingChannelId(): ?string
    {
        return $this->fields['processingChannelId'] ?? null;
    }

    public function setProcessingChannelId(null|string $processingChannelId): static
    {
        $this->fields['processingChannelId'] = $processingChannelId;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('markAsWaitingGatewayOnPendingPayout', $this->fields)) {
            $data['markAsWaitingGatewayOnPendingPayout'] = $this->fields['markAsWaitingGatewayOnPendingPayout'];
        }
        if (array_key_exists('subEntityIdWebsiteCustomField', $this->fields)) {
            $data['subEntityIdWebsiteCustomField'] = $this->fields['subEntityIdWebsiteCustomField'];
        }
        if (array_key_exists('processingChannelId', $this->fields)) {
            $data['processingChannelId'] = $this->fields['processingChannelId'];
        }

        return $data;
    }
}
