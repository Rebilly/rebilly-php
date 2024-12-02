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

class DLocalSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('createInstallmentPlan', $data)) {
            $this->setCreateInstallmentPlan($data['createInstallmentPlan']);
        }
        if (array_key_exists('customerDocumentCustomField', $data)) {
            $this->setCustomerDocumentCustomField($data['customerDocumentCustomField']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
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

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('createInstallmentPlan', $this->fields)) {
            $data['createInstallmentPlan'] = $this->fields['createInstallmentPlan'];
        }
        if (array_key_exists('customerDocumentCustomField', $this->fields)) {
            $data['customerDocumentCustomField'] = $this->fields['customerDocumentCustomField'];
        }

        return $data;
    }
}
