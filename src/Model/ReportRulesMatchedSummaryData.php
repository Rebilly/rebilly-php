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

class ReportRulesMatchedSummaryData implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('rule', $data)) {
            $this->setRule($data['rule']);
        }
        if (array_key_exists('count', $data)) {
            $this->setCount($data['count']);
        }
        if (array_key_exists('approvalRate', $data)) {
            $this->setApprovalRate($data['approvalRate']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getRule(): ?string
    {
        return $this->fields['rule'] ?? null;
    }

    public function setRule(null|string $rule): static
    {
        $this->fields['rule'] = $rule;

        return $this;
    }

    public function getCount(): ?int
    {
        return $this->fields['count'] ?? null;
    }

    public function setCount(null|int $count): static
    {
        $this->fields['count'] = $count;

        return $this;
    }

    public function getApprovalRate(): ?float
    {
        return $this->fields['approvalRate'] ?? null;
    }

    public function setApprovalRate(null|float|string $approvalRate): static
    {
        if (is_string($approvalRate)) {
            $approvalRate = (float) $approvalRate;
        }

        $this->fields['approvalRate'] = $approvalRate;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('rule', $this->fields)) {
            $data['rule'] = $this->fields['rule'];
        }
        if (array_key_exists('count', $this->fields)) {
            $data['count'] = $this->fields['count'];
        }
        if (array_key_exists('approvalRate', $this->fields)) {
            $data['approvalRate'] = $this->fields['approvalRate'];
        }

        return $data;
    }
}
