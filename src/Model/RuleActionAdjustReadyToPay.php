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

use Rebilly\Sdk\Trait\HasMetadata;

class RuleActionAdjustReadyToPay extends RuleAction
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        parent::__construct([
            'name' => 'adjust-ready-to-pay',
        ] + $data, $metadata);

        if (array_key_exists('prioritizeActivePaymentInstruments', $data)) {
            $this->setPrioritizeActivePaymentInstruments($data['prioritizeActivePaymentInstruments']);
        }
        if (array_key_exists('paymentMethods', $data)) {
            $this->setPaymentMethods($data['paymentMethods']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getPrioritizeActivePaymentInstruments(): ?bool
    {
        return $this->fields['prioritizeActivePaymentInstruments'] ?? null;
    }

    public function setPrioritizeActivePaymentInstruments(null|bool $prioritizeActivePaymentInstruments): static
    {
        $this->fields['prioritizeActivePaymentInstruments'] = $prioritizeActivePaymentInstruments;

        return $this;
    }

    /**
     * @return null|AdjustPaymentMethod[]
     */
    public function getPaymentMethods(): ?array
    {
        return $this->fields['paymentMethods'] ?? null;
    }

    /**
     * @param null|AdjustPaymentMethod[]|array[] $paymentMethods
     */
    public function setPaymentMethods(null|array $paymentMethods): static
    {
        $paymentMethods = $paymentMethods !== null ? array_map(
            fn ($value) => $value instanceof AdjustPaymentMethod ? $value : AdjustPaymentMethodFactory::from($value),
            $paymentMethods,
        ) : null;

        $this->fields['paymentMethods'] = $paymentMethods;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('prioritizeActivePaymentInstruments', $this->fields)) {
            $data['prioritizeActivePaymentInstruments'] = $this->fields['prioritizeActivePaymentInstruments'];
        }
        if (array_key_exists('paymentMethods', $this->fields)) {
            $data['paymentMethods'] = $this->fields['paymentMethods'] !== null
                ? array_map(
                    static fn (AdjustPaymentMethod $adjustPaymentMethod) => $adjustPaymentMethod->jsonSerialize(),
                    $this->fields['paymentMethods'],
                )
                : null;
        }

        return parent::jsonSerialize() + $data;
    }
}
