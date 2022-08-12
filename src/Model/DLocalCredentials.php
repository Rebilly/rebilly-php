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

class DLocalCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('xLogin', $data)) {
            $this->setXLogin($data['xLogin']);
        }
        if (array_key_exists('xTransKey', $data)) {
            $this->setXTransKey($data['xTransKey']);
        }
        if (array_key_exists('secretKey', $data)) {
            $this->setSecretKey($data['secretKey']);
        }
        if (array_key_exists('xPayoutLogin', $data)) {
            $this->setXPayoutLogin($data['xPayoutLogin']);
        }
        if (array_key_exists('xPayoutTransKey', $data)) {
            $this->setXPayoutTransKey($data['xPayoutTransKey']);
        }
        if (array_key_exists('payoutSecretKey', $data)) {
            $this->setPayoutSecretKey($data['payoutSecretKey']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getXLogin(): string
    {
        return $this->fields['xLogin'];
    }

    public function setXLogin(string $xLogin): self
    {
        $this->fields['xLogin'] = $xLogin;

        return $this;
    }

    public function getXTransKey(): string
    {
        return $this->fields['xTransKey'];
    }

    public function setXTransKey(string $xTransKey): self
    {
        $this->fields['xTransKey'] = $xTransKey;

        return $this;
    }

    public function getSecretKey(): string
    {
        return $this->fields['secretKey'];
    }

    public function setSecretKey(string $secretKey): self
    {
        $this->fields['secretKey'] = $secretKey;

        return $this;
    }

    public function getXPayoutLogin(): ?string
    {
        return $this->fields['xPayoutLogin'] ?? null;
    }

    public function setXPayoutLogin(null|string $xPayoutLogin): self
    {
        $this->fields['xPayoutLogin'] = $xPayoutLogin;

        return $this;
    }

    public function getXPayoutTransKey(): ?string
    {
        return $this->fields['xPayoutTransKey'] ?? null;
    }

    public function setXPayoutTransKey(null|string $xPayoutTransKey): self
    {
        $this->fields['xPayoutTransKey'] = $xPayoutTransKey;

        return $this;
    }

    public function getPayoutSecretKey(): ?string
    {
        return $this->fields['payoutSecretKey'] ?? null;
    }

    public function setPayoutSecretKey(null|string $payoutSecretKey): self
    {
        $this->fields['payoutSecretKey'] = $payoutSecretKey;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('xLogin', $this->fields)) {
            $data['xLogin'] = $this->fields['xLogin'];
        }
        if (array_key_exists('xTransKey', $this->fields)) {
            $data['xTransKey'] = $this->fields['xTransKey'];
        }
        if (array_key_exists('secretKey', $this->fields)) {
            $data['secretKey'] = $this->fields['secretKey'];
        }
        if (array_key_exists('xPayoutLogin', $this->fields)) {
            $data['xPayoutLogin'] = $this->fields['xPayoutLogin'];
        }
        if (array_key_exists('xPayoutTransKey', $this->fields)) {
            $data['xPayoutTransKey'] = $this->fields['xPayoutTransKey'];
        }
        if (array_key_exists('payoutSecretKey', $this->fields)) {
            $data['payoutSecretKey'] = $this->fields['payoutSecretKey'];
        }

        return $data;
    }
}
