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

class CheckoutFormPlans implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('checkoutFormPlans', $data)) {
            $this->setCheckoutFormPlans($data['checkoutFormPlans']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCheckoutFormPlans(): ?CheckoutFormPlan
    {
        return $this->fields['checkoutFormPlans'] ?? null;
    }

    public function setCheckoutFormPlans(null|CheckoutFormPlan|array $checkoutFormPlans): self
    {
        if ($checkoutFormPlans !== null && !($checkoutFormPlans instanceof CheckoutFormPlan)) {
            $checkoutFormPlans = CheckoutFormPlan::from($checkoutFormPlans);
        }

        $this->fields['checkoutFormPlans'] = $checkoutFormPlans;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('checkoutFormPlans', $this->fields)) {
            $data['checkoutFormPlans'] = $this->fields['checkoutFormPlans']?->jsonSerialize();
        }

        return $data;
    }
}
