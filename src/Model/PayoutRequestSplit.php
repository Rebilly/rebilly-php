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

class PayoutRequestSplit implements JsonSerializable
{
    use HasMetadata;

    public const SPLIT_REASON_PAYMENT_INSTRUMENT_LIMIT = 'payment-instrument-limit';

    public const SPLIT_REASON_PROCESSOR_LIMIT = 'processor-limit';

    public const SPLIT_REASON_RISK_REVIEW = 'risk-review';

    public const SPLIT_REASON_COMPLIANCE_REVIEW = 'compliance-review';

    public const SPLIT_REASON_PARTIAL_PROCESSING = 'partial-processing';

    public const SPLIT_REASON_OPERATIONAL_RECONCILIATION = 'operational-reconciliation';

    public const SPLIT_REASON_OTHER = 'other';

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('amounts', $data)) {
            $this->setAmounts($data['amounts']);
        }
        if (array_key_exists('splitReason', $data)) {
            $this->setSplitReason($data['splitReason']);
        }
        if (array_key_exists('splitDescription', $data)) {
            $this->setSplitDescription($data['splitDescription']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    /**
     * @return float[]
     */
    public function getAmounts(): array
    {
        return $this->fields['amounts'];
    }

    /**
     * @param float[]|string[] $amounts
     */
    public function setAmounts(array $amounts): static
    {
        $amounts = array_map(
            fn ($value) => is_string($value) ? (float) $value : $value,
            $amounts,
        );

        $this->fields['amounts'] = $amounts;

        return $this;
    }

    public function getSplitReason(): string
    {
        return $this->fields['splitReason'];
    }

    public function setSplitReason(string $splitReason): static
    {
        $this->fields['splitReason'] = $splitReason;

        return $this;
    }

    public function getSplitDescription(): ?string
    {
        return $this->fields['splitDescription'] ?? null;
    }

    public function setSplitDescription(null|string $splitDescription): static
    {
        $this->fields['splitDescription'] = $splitDescription;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('amounts', $this->fields)) {
            $data['amounts'] = $this->fields['amounts'];
        }
        if (array_key_exists('splitReason', $this->fields)) {
            $data['splitReason'] = $this->fields['splitReason'];
        }
        if (array_key_exists('splitDescription', $this->fields)) {
            $data['splitDescription'] = $this->fields['splitDescription'];
        }

        return $data;
    }
}
