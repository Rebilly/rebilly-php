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

class AdjustReadyToPayPaypal implements JsonSerializable
{
    public const PAYMENT_METHOD_PAYPAL = 'paypal';

    public const FEATURE_PAY_PAL_BILLING_AGREEMENT = 'PayPal billing agreement';

    private array $fields = [];

    public function __construct(array $data = [])
    {
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
     * @psalm-return self::PAYMENT_METHOD_*|null $paymentMethod
     */
    public function getPaymentMethod(): ?string
    {
        return $this->fields['paymentMethod'] ?? null;
    }

    /**
     * @psalm-param self::PAYMENT_METHOD_*|null $paymentMethod
     */
    public function setPaymentMethod(null|string $paymentMethod): self
    {
        $this->fields['paymentMethod'] = $paymentMethod;

        return $this;
    }

    /**
     * @psalm-return self::FEATURE_*|null $feature
     */
    public function getFeature(): ?string
    {
        return $this->fields['feature'] ?? null;
    }

    /**
     * @psalm-param self::FEATURE_*|null $feature
     */
    public function setFeature(null|string $feature): self
    {
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
            $data['feature'] = $this->fields['feature'];
        }

        return $data;
    }
}
