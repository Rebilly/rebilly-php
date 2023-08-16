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

class CommonBillingPortalFeatures implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('authenticateWithPassword', $data)) {
            $this->setAuthenticateWithPassword($data['authenticateWithPassword']);
        }
        if (array_key_exists('orderCancel', $data)) {
            $this->setOrderCancel($data['orderCancel']);
        }
        if (array_key_exists('orderAddressEdit', $data)) {
            $this->setOrderAddressEdit($data['orderAddressEdit']);
        }
        if (array_key_exists('paymentInstrumentAdd', $data)) {
            $this->setPaymentInstrumentAdd($data['paymentInstrumentAdd']);
        }
        if (array_key_exists('paymentInstrumentUpdate', $data)) {
            $this->setPaymentInstrumentUpdate($data['paymentInstrumentUpdate']);
        }
        if (array_key_exists('paymentInstrumentDeactivate', $data)) {
            $this->setPaymentInstrumentDeactivate($data['paymentInstrumentDeactivate']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getAuthenticateWithPassword(): ?bool
    {
        return $this->fields['authenticateWithPassword'] ?? null;
    }

    public function setAuthenticateWithPassword(null|bool $authenticateWithPassword): static
    {
        $this->fields['authenticateWithPassword'] = $authenticateWithPassword;

        return $this;
    }

    public function getOrderCancel(): ?bool
    {
        return $this->fields['orderCancel'] ?? null;
    }

    public function setOrderCancel(null|bool $orderCancel): static
    {
        $this->fields['orderCancel'] = $orderCancel;

        return $this;
    }

    public function getOrderAddressEdit(): ?bool
    {
        return $this->fields['orderAddressEdit'] ?? null;
    }

    public function setOrderAddressEdit(null|bool $orderAddressEdit): static
    {
        $this->fields['orderAddressEdit'] = $orderAddressEdit;

        return $this;
    }

    public function getPaymentInstrumentAdd(): ?bool
    {
        return $this->fields['paymentInstrumentAdd'] ?? null;
    }

    public function setPaymentInstrumentAdd(null|bool $paymentInstrumentAdd): static
    {
        $this->fields['paymentInstrumentAdd'] = $paymentInstrumentAdd;

        return $this;
    }

    public function getPaymentInstrumentUpdate(): ?bool
    {
        return $this->fields['paymentInstrumentUpdate'] ?? null;
    }

    public function setPaymentInstrumentUpdate(null|bool $paymentInstrumentUpdate): static
    {
        $this->fields['paymentInstrumentUpdate'] = $paymentInstrumentUpdate;

        return $this;
    }

    public function getPaymentInstrumentDeactivate(): ?bool
    {
        return $this->fields['paymentInstrumentDeactivate'] ?? null;
    }

    public function setPaymentInstrumentDeactivate(null|bool $paymentInstrumentDeactivate): static
    {
        $this->fields['paymentInstrumentDeactivate'] = $paymentInstrumentDeactivate;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('authenticateWithPassword', $this->fields)) {
            $data['authenticateWithPassword'] = $this->fields['authenticateWithPassword'];
        }
        if (array_key_exists('orderCancel', $this->fields)) {
            $data['orderCancel'] = $this->fields['orderCancel'];
        }
        if (array_key_exists('orderAddressEdit', $this->fields)) {
            $data['orderAddressEdit'] = $this->fields['orderAddressEdit'];
        }
        if (array_key_exists('paymentInstrumentAdd', $this->fields)) {
            $data['paymentInstrumentAdd'] = $this->fields['paymentInstrumentAdd'];
        }
        if (array_key_exists('paymentInstrumentUpdate', $this->fields)) {
            $data['paymentInstrumentUpdate'] = $this->fields['paymentInstrumentUpdate'];
        }
        if (array_key_exists('paymentInstrumentDeactivate', $this->fields)) {
            $data['paymentInstrumentDeactivate'] = $this->fields['paymentInstrumentDeactivate'];
        }

        return $data;
    }
}
