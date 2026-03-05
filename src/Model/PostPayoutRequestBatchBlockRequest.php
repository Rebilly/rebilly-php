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

class PostPayoutRequestBatchBlockRequest implements JsonSerializable
{
    public const REASON_FRAUD_SUSPECTED = 'fraud-suspected';

    public const REASON_KYC_VERIFICATION_REQUIRED = 'kyc-verification-required';

    public const REASON_AML_REVIEW = 'aml-review';

    public const REASON_ACCOUNT_VERIFICATION = 'account-verification';

    public const REASON_DUPLICATE_REQUEST = 'duplicate-request';

    public const REASON_INSUFFICIENT_DOCUMENTATION = 'insufficient-documentation';

    public const REASON_RISK_REVIEW = 'risk-review';

    public const REASON_OTHER = 'other';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('reason', $data)) {
            $this->setReason($data['reason']);
        }
        if (array_key_exists('description', $data)) {
            $this->setDescription($data['description']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getReason(): string
    {
        return $this->fields['reason'];
    }

    public function setReason(string $reason): static
    {
        $this->fields['reason'] = $reason;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->fields['description'] ?? null;
    }

    public function setDescription(null|string $description): static
    {
        $this->fields['description'] = $description;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('reason', $this->fields)) {
            $data['reason'] = $this->fields['reason'];
        }
        if (array_key_exists('description', $this->fields)) {
            $data['description'] = $this->fields['description'];
        }

        return $data;
    }
}
