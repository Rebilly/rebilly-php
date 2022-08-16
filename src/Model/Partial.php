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

use InvalidArgumentException;

class Partial extends AmountAdjustment
{
    public const TYPE_PERCENT = 'percent';

    public const TYPE_FIXED = 'fixed';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'method' => 'partial',
        ] + $data);

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

    public function getValue(): float
    {
        return $this->fields['value'];
    }

    public function setValue(float|string $value): self
    {
        if (is_string($value)) {
            $value = (float) $value;
        }

        $this->fields['value'] = $value;

        return $this;
    }

    /**
     * @psalm-return self::TYPE_* $type
     */
    public function getType(): string
    {
        return $this->fields['type'];
    }

    /**
     * @psalm-param self::TYPE_* $type
     */
    public function setType(string $type): self
    {
        $this->fields['type'] = $type;

        return $this;
    }

    public function getAfterApprovalPolicy(): null|DiscountAmountRemaining|None
    {
        return $this->fields['afterApprovalPolicy'] ?? null;
    }

    public function setAfterApprovalPolicy(null|array|DiscountAmountRemaining|None $afterApprovalPolicy): self
    {
        $afterApprovalPolicy = $this->ensureAfterApprovalPolicy($afterApprovalPolicy);

        $this->fields['afterApprovalPolicy'] = $afterApprovalPolicy;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('value', $this->fields)) {
            $data['value'] = $this->fields['value'];
        }
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('afterApprovalPolicy', $this->fields)) {
            $data['afterApprovalPolicy'] = $this->fields['afterApprovalPolicy'];
        }

        return parent::jsonSerialize() + $data;
    }

    protected function ensureAfterApprovalPolicy(null|array|DiscountAmountRemaining|None $data): DiscountAmountRemaining|None
    {
        if (
            $data === null
            || $data instanceof DiscountAmountRemaining
            || $data instanceof None
        ) {
            return $data;
        }
        $candidates = [];
        $candidates[] = DiscountAmountRemaining::tryFrom($data);
        $candidates[] = None::tryFrom($data);

        $determined = array_reduce($candidates, function (?array $current, array $candidate) {
            if ($current === null || $current[1] < $candidate[1]) {
                $current = $candidate;
            }

            return $current;
        });

        if (
            $determined[0] === null
            || $determined[0] instanceof DiscountAmountRemaining
            || $determined[0] instanceof None
        ) {
            return $determined[0];
        }

        throw new InvalidArgumentException('Could not instantiate afterApprovalPolicy with the given value');
    }
}
