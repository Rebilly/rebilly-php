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

class Directa24Credentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('x_login', $data)) {
            $this->setXLogin($data['x_login']);
        }
        if (array_key_exists('x_tran_key', $data)) {
            $this->setXTranKey($data['x_tran_key']);
        }
        if (array_key_exists('secret_key', $data)) {
            $this->setSecretKey($data['secret_key']);
        }
        if (array_key_exists('web_pay_login', $data)) {
            $this->setWebPayLogin($data['web_pay_login']);
        }
        if (array_key_exists('web_pay_tran_key', $data)) {
            $this->setWebPayTranKey($data['web_pay_tran_key']);
        }
        if (array_key_exists('cashout_login', $data)) {
            $this->setCashoutLogin($data['cashout_login']);
        }
        if (array_key_exists('cashout_password', $data)) {
            $this->setCashoutPassword($data['cashout_password']);
        }
        if (array_key_exists('chargebackAccessKey', $data)) {
            $this->setChargebackAccessKey($data['chargebackAccessKey']);
        }
        if (array_key_exists('chargebackSecretKey', $data)) {
            $this->setChargebackSecretKey($data['chargebackSecretKey']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getXLogin(): string
    {
        return $this->fields['x_login'];
    }

    public function setXLogin(string $xLogin): static
    {
        $this->fields['x_login'] = $xLogin;

        return $this;
    }

    public function getXTranKey(): string
    {
        return $this->fields['x_tran_key'];
    }

    public function setXTranKey(string $xTranKey): static
    {
        $this->fields['x_tran_key'] = $xTranKey;

        return $this;
    }

    public function getSecretKey(): string
    {
        return $this->fields['secret_key'];
    }

    public function setSecretKey(string $secretKey): static
    {
        $this->fields['secret_key'] = $secretKey;

        return $this;
    }

    public function getWebPayLogin(): string
    {
        return $this->fields['web_pay_login'];
    }

    public function setWebPayLogin(string $webPayLogin): static
    {
        $this->fields['web_pay_login'] = $webPayLogin;

        return $this;
    }

    public function getWebPayTranKey(): string
    {
        return $this->fields['web_pay_tran_key'];
    }

    public function setWebPayTranKey(string $webPayTranKey): static
    {
        $this->fields['web_pay_tran_key'] = $webPayTranKey;

        return $this;
    }

    public function getCashoutLogin(): ?string
    {
        return $this->fields['cashout_login'] ?? null;
    }

    public function setCashoutLogin(null|string $cashoutLogin): static
    {
        $this->fields['cashout_login'] = $cashoutLogin;

        return $this;
    }

    public function getCashoutPassword(): ?string
    {
        return $this->fields['cashout_password'] ?? null;
    }

    public function setCashoutPassword(null|string $cashoutPassword): static
    {
        $this->fields['cashout_password'] = $cashoutPassword;

        return $this;
    }

    public function getChargebackAccessKey(): ?string
    {
        return $this->fields['chargebackAccessKey'] ?? null;
    }

    public function setChargebackAccessKey(null|string $chargebackAccessKey): static
    {
        $this->fields['chargebackAccessKey'] = $chargebackAccessKey;

        return $this;
    }

    public function getChargebackSecretKey(): ?string
    {
        return $this->fields['chargebackSecretKey'] ?? null;
    }

    public function setChargebackSecretKey(null|string $chargebackSecretKey): static
    {
        $this->fields['chargebackSecretKey'] = $chargebackSecretKey;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('x_login', $this->fields)) {
            $data['x_login'] = $this->fields['x_login'];
        }
        if (array_key_exists('x_tran_key', $this->fields)) {
            $data['x_tran_key'] = $this->fields['x_tran_key'];
        }
        if (array_key_exists('secret_key', $this->fields)) {
            $data['secret_key'] = $this->fields['secret_key'];
        }
        if (array_key_exists('web_pay_login', $this->fields)) {
            $data['web_pay_login'] = $this->fields['web_pay_login'];
        }
        if (array_key_exists('web_pay_tran_key', $this->fields)) {
            $data['web_pay_tran_key'] = $this->fields['web_pay_tran_key'];
        }
        if (array_key_exists('cashout_login', $this->fields)) {
            $data['cashout_login'] = $this->fields['cashout_login'];
        }
        if (array_key_exists('cashout_password', $this->fields)) {
            $data['cashout_password'] = $this->fields['cashout_password'];
        }
        if (array_key_exists('chargebackAccessKey', $this->fields)) {
            $data['chargebackAccessKey'] = $this->fields['chargebackAccessKey'];
        }
        if (array_key_exists('chargebackSecretKey', $this->fields)) {
            $data['chargebackSecretKey'] = $this->fields['chargebackSecretKey'];
        }

        return $data;
    }
}
