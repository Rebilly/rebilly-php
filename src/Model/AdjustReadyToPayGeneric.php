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

class AdjustReadyToPayGeneric implements JsonSerializable
{
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

    public function getPaymentMethod(): ?AlternativePaymentMethods
    {
        return $this->fields['paymentMethod'] ?? null;
    }

    public function setPaymentMethod(null|AlternativePaymentMethods|string $paymentMethod): self
    {
        if ($paymentMethod !== null && !($paymentMethod instanceof AlternativePaymentMethods)) {
            $paymentMethod = AlternativePaymentMethods::from($paymentMethod);
        }

        $this->fields['paymentMethod'] = $paymentMethod;

        return $this;
    }

    public function getFeature(): ?string
    {
        return $this->fields['feature'] ?? null;
    }

    public function setFeature(null|string $feature): self
    {
        $this->fields['feature'] = $feature;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('paymentMethod', $this->fields)) {
            $data['paymentMethod'] = $this->fields['paymentMethod']?->value;
        }
        if (array_key_exists('feature', $this->fields)) {
            $data['feature'] = $this->fields['feature'];
        }

        return $data;
    }
}
