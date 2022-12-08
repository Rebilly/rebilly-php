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

class PaymentCardTokenPaymentInstrument implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('pan', $data)) {
            $this->setPan($data['pan']);
        }
        if (array_key_exists('cvv', $data)) {
            $this->setCvv($data['cvv']);
        }
        if (array_key_exists('expMonth', $data)) {
            $this->setExpMonth($data['expMonth']);
        }
        if (array_key_exists('expYear', $data)) {
            $this->setExpYear($data['expYear']);
        }
        if (array_key_exists('bin', $data)) {
            $this->setBin($data['bin']);
        }
        if (array_key_exists('last4', $data)) {
            $this->setLast4($data['last4']);
        }
        if (array_key_exists('brand', $data)) {
            $this->setBrand($data['brand']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPan(): ?string
    {
        return $this->fields['pan'] ?? null;
    }

    public function setPan(null|string $pan): self
    {
        $this->fields['pan'] = $pan;

        return $this;
    }

    public function getCvv(): ?string
    {
        return $this->fields['cvv'] ?? null;
    }

    public function setCvv(null|string $cvv): self
    {
        $this->fields['cvv'] = $cvv;

        return $this;
    }

    public function getExpMonth(): int
    {
        return $this->fields['expMonth'];
    }

    public function setExpMonth(int $expMonth): self
    {
        $this->fields['expMonth'] = $expMonth;

        return $this;
    }

    public function getExpYear(): int
    {
        return $this->fields['expYear'];
    }

    public function setExpYear(int $expYear): self
    {
        $this->fields['expYear'] = $expYear;

        return $this;
    }

    public function getBin(): ?string
    {
        return $this->fields['bin'] ?? null;
    }

    public function getLast4(): ?string
    {
        return $this->fields['last4'] ?? null;
    }

    public function getBrand(): ?PaymentCardBrand
    {
        return $this->fields['brand'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('pan', $this->fields)) {
            $data['pan'] = $this->fields['pan'];
        }
        if (array_key_exists('cvv', $this->fields)) {
            $data['cvv'] = $this->fields['cvv'];
        }
        if (array_key_exists('expMonth', $this->fields)) {
            $data['expMonth'] = $this->fields['expMonth'];
        }
        if (array_key_exists('expYear', $this->fields)) {
            $data['expYear'] = $this->fields['expYear'];
        }
        if (array_key_exists('bin', $this->fields)) {
            $data['bin'] = $this->fields['bin'];
        }
        if (array_key_exists('last4', $this->fields)) {
            $data['last4'] = $this->fields['last4'];
        }
        if (array_key_exists('brand', $this->fields)) {
            $data['brand'] = $this->fields['brand']?->value;
        }

        return $data;
    }

    private function setBin(null|string $bin): self
    {
        $this->fields['bin'] = $bin;

        return $this;
    }

    private function setLast4(null|string $last4): self
    {
        $this->fields['last4'] = $last4;

        return $this;
    }

    private function setBrand(null|PaymentCardBrand|string $brand): self
    {
        if ($brand !== null && !($brand instanceof PaymentCardBrand)) {
            $brand = PaymentCardBrand::from($brand);
        }

        $this->fields['brand'] = $brand;

        return $this;
    }
}
