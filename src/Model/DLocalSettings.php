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
use Rebilly\Sdk\Trait\HasMetadata;

class DLocalSettings implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('createInstallmentPlan', $data)) {
            $this->setCreateInstallmentPlan($data['createInstallmentPlan']);
        }
        if (array_key_exists('customerDocumentCustomField', $data)) {
            $this->setCustomerDocumentCustomField($data['customerDocumentCustomField']);
        }
        if (array_key_exists('requestAddress', $data)) {
            $this->setRequestAddress($data['requestAddress']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getCreateInstallmentPlan(): ?bool
    {
        return $this->fields['createInstallmentPlan'] ?? null;
    }

    public function setCreateInstallmentPlan(null|bool $createInstallmentPlan): static
    {
        $this->fields['createInstallmentPlan'] = $createInstallmentPlan;

        return $this;
    }

    public function getCustomerDocumentCustomField(): ?string
    {
        return $this->fields['customerDocumentCustomField'] ?? null;
    }

    public function setCustomerDocumentCustomField(null|string $customerDocumentCustomField): static
    {
        $this->fields['customerDocumentCustomField'] = $customerDocumentCustomField;

        return $this;
    }

    public function getRequestAddress(): ?bool
    {
        return $this->fields['requestAddress'] ?? null;
    }

    public function setRequestAddress(null|bool $requestAddress): static
    {
        $this->fields['requestAddress'] = $requestAddress;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('createInstallmentPlan', $this->fields)) {
            $data['createInstallmentPlan'] = $this->fields['createInstallmentPlan'];
        }
        if (array_key_exists('customerDocumentCustomField', $this->fields)) {
            $data['customerDocumentCustomField'] = $this->fields['customerDocumentCustomField'];
        }
        if (array_key_exists('requestAddress', $this->fields)) {
            $data['requestAddress'] = $this->fields['requestAddress'];
        }

        return $data;
    }
}
