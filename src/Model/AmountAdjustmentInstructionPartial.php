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

class AmountAdjustmentInstructionPartial implements InvoiceRetryAmountAdjustmentInstruction
{
    public const TYPE_PERCENT = 'percent';

    public const TYPE_FIXED = 'fixed';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('value', $data)) {
            $this->setValue($data['value']);
        }
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('afterApprovalPolicy', $data)) {
            $this->setAfterApprovalPolicy($data['afterApprovalPolicy']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMethod(): string
    {
        return 'partial';
    }

    public function getValue(): float
    {
        return $this->fields['value'];
    }

    public function setValue(float|string $value): static
    {
        if (is_string($value)) {
            $value = (float) $value;
        }

        $this->fields['value'] = $value;

        return $this;
    }

    public function getType(): string
    {
        return $this->fields['type'];
    }

    public function setType(string $type): static
    {
        $this->fields['type'] = $type;

        return $this;
    }

    public function getAfterApprovalPolicy(): ?AmountAdjustmentInstructionPartialAfterApprovalPolicy
    {
        return $this->fields['afterApprovalPolicy'] ?? null;
    }

    public function setAfterApprovalPolicy(null|AmountAdjustmentInstructionPartialAfterApprovalPolicy|array $afterApprovalPolicy): static
    {
        if ($afterApprovalPolicy !== null && !($afterApprovalPolicy instanceof AmountAdjustmentInstructionPartialAfterApprovalPolicy)) {
            $afterApprovalPolicy = AmountAdjustmentInstructionPartialAfterApprovalPolicyFactory::from($afterApprovalPolicy);
        }

        $this->fields['afterApprovalPolicy'] = $afterApprovalPolicy;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'method' => 'partial',
        ];
        if (array_key_exists('value', $this->fields)) {
            $data['value'] = $this->fields['value'];
        }
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('afterApprovalPolicy', $this->fields)) {
            $data['afterApprovalPolicy'] = $this->fields['afterApprovalPolicy']?->jsonSerialize();
        }

        return $data;
    }
}
