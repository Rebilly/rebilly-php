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

class AdjustReadyToPay extends RuleAction
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'name' => 'adjust-ready-to-pay',
        ] + $data);

        if (array_key_exists('prioritizeActivePaymentInstruments', $data)) {
            $this->setPrioritizeActivePaymentInstruments($data['prioritizeActivePaymentInstruments']);
        }
        if (array_key_exists('paymentMethods', $data)) {
            $this->setPaymentMethods($data['paymentMethods']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPrioritizeActivePaymentInstruments(): ?bool
    {
        return $this->fields['prioritizeActivePaymentInstruments'] ?? null;
    }

    public function setPrioritizeActivePaymentInstruments(null|bool $prioritizeActivePaymentInstruments): self
    {
        $this->fields['prioritizeActivePaymentInstruments'] = $prioritizeActivePaymentInstruments;

        return $this;
    }

    /**
     * @return null|\Rebilly\Sdk\Model\AdjustPaymentMethod[]
     */
    public function getPaymentMethods(): ?array
    {
        return $this->fields['paymentMethods'] ?? null;
    }

    /**
     * @param null|\Rebilly\Sdk\Model\AdjustPaymentMethod[] $paymentMethods
     */
    public function setPaymentMethods(null|array $paymentMethods): self
    {
        $paymentMethods = $paymentMethods !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof \Rebilly\Sdk\Model\AdjustPaymentMethod ? $value : \Rebilly\Sdk\Model\AdjustPaymentMethod::from($value)) : null, $paymentMethods) : null;

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
            $data['paymentMethods'] = $this->fields['paymentMethods'];
        }

        return parent::jsonSerialize() + $data;
    }
}
