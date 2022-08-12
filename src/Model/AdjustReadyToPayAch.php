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

class AdjustReadyToPayAch extends AdjustPaymentMethod
{
    public const PAYMENT_METHOD_ACH = 'ach';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct([
            'paymentMethod' => 'ach',
        ] + $data);

        if (array_key_exists('paymentMethod', $data)) {
            $this->setPaymentMethod($data['paymentMethod']);
        }
        if (array_key_exists('feature', $data)) {
            $this->setFeature($data['feature']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @psalm-return self::PAYMENT_METHOD_* $paymentMethod
     */
    public function getPaymentMethod(): string
    {
        return $this->fields['paymentMethod'];
    }

    /**
     * @psalm-param self::PAYMENT_METHOD_* $paymentMethod
     */
    public function setPaymentMethod(string $paymentMethod): self
    {
        $this->fields['paymentMethod'] = $paymentMethod;

        return $this;
    }

    public function getFeature(): PlaidFeatureName
    {
        return $this->fields['feature'];
    }

    public function setFeature(PlaidFeatureName|string $feature): self
    {
        if (!($feature instanceof PlaidFeatureName)) {
            $feature = PlaidFeatureName::from($feature);
        }

        $this->fields['feature'] = $feature;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('paymentMethod', $this->fields)) {
            $data['paymentMethod'] = $this->fields['paymentMethod'];
        }
        if (array_key_exists('feature', $this->fields)) {
            $data['feature'] = $this->fields['feature']?->value;
        }

        return parent::jsonSerialize() + $data;
    }
}
