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

class None implements InvoiceRetryAmountAdjustmentInstruction, PartialAfterApprovalPolicy, JsonSerializable
{
    public const METHOD_NONE = 'none';

    public const TYPE_PERCENT = 'percent';

    public const TYPE_FIXED = 'fixed';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('method', $data)) {
            $this->setMethod($data['method']);
        }
        if (array_key_exists('afterApprovalPolicy', $data)) {
            $this->setAfterApprovalPolicy($data['afterApprovalPolicy']);
        }
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('value', $data)) {
            $this->setValue($data['value']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMethod(): string
    {
        return $this->fields['method'];
    }

    public function setMethod(string $method): static
    {
        $this->fields['method'] = $method;

        return $this;
    }

    public function getAfterApprovalPolicy(): ?PartialAfterApprovalPolicy
    {
        return $this->fields['afterApprovalPolicy'] ?? null;
    }

    public function setAfterApprovalPolicy(null|PartialAfterApprovalPolicy|array $afterApprovalPolicy): static
    {
        if ($afterApprovalPolicy !== null && !($afterApprovalPolicy instanceof PartialAfterApprovalPolicy)) {
            $afterApprovalPolicy = PartialAfterApprovalPolicyFactory::from($afterApprovalPolicy);
        }

        $this->fields['afterApprovalPolicy'] = $afterApprovalPolicy;

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

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('method', $this->fields)) {
            $data['method'] = $this->fields['method'];
        }
        if (array_key_exists('afterApprovalPolicy', $this->fields)) {
            $data['afterApprovalPolicy'] = $this->fields['afterApprovalPolicy']?->jsonSerialize();
        }
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('value', $this->fields)) {
            $data['value'] = $this->fields['value'];
        }

        return $data;
    }
}
