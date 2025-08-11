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
    public const BRAND_VISA = 'Visa';

    public const BRAND_MASTER_CARD = 'MasterCard';

    public const BRAND_AMERICAN_EXPRESS = 'American Express';

    public const BRAND_DISCOVER = 'Discover';

    public const BRAND_MAESTRO = 'Maestro';

    public const BRAND_SOLO = 'Solo';

    public const BRAND_ELECTRON = 'Electron';

    public const BRAND_JCB = 'JCB';

    public const BRAND_VOYAGER = 'Voyager';

    public const BRAND_DINERS_CLUB = 'Diners Club';

    public const BRAND_SWITCH = 'Switch';

    public const BRAND_LASER = 'Laser';

    public const BRAND_CHINA_UNION_PAY = 'China UnionPay';

    public const BRAND_ASTRO_PAY_CARD = 'AstroPay Card';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('pan', $data)) {
            $this->setPan($data['pan']);
        }
        if (array_key_exists('cvv', $data)) {
            $this->setCvv($data['cvv']);
        }
        if (array_key_exists('encryptedCvv', $data)) {
            $this->setEncryptedCvv($data['encryptedCvv']);
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

    public function setPan(null|string $pan): static
    {
        $this->fields['pan'] = $pan;

        return $this;
    }

    public function getCvv(): ?string
    {
        return $this->fields['cvv'] ?? null;
    }

    public function setCvv(null|string $cvv): static
    {
        $this->fields['cvv'] = $cvv;

        return $this;
    }

    public function getEncryptedCvv(): ?string
    {
        return $this->fields['encryptedCvv'] ?? null;
    }

    public function setEncryptedCvv(null|string $encryptedCvv): static
    {
        $this->fields['encryptedCvv'] = $encryptedCvv;

        return $this;
    }

    public function getExpMonth(): int
    {
        return $this->fields['expMonth'];
    }

    public function setExpMonth(int $expMonth): static
    {
        $this->fields['expMonth'] = $expMonth;

        return $this;
    }

    public function getExpYear(): int
    {
        return $this->fields['expYear'];
    }

    public function setExpYear(int $expYear): static
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

    public function getBrand(): ?string
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
        if (array_key_exists('encryptedCvv', $this->fields)) {
            $data['encryptedCvv'] = $this->fields['encryptedCvv'];
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
            $data['brand'] = $this->fields['brand'];
        }

        return $data;
    }

    private function setBin(null|string $bin): static
    {
        $this->fields['bin'] = $bin;

        return $this;
    }

    private function setLast4(null|string $last4): static
    {
        $this->fields['last4'] = $last4;

        return $this;
    }

    private function setBrand(null|string $brand): static
    {
        $this->fields['brand'] = $brand;

        return $this;
    }
}
