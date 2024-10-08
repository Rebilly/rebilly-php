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

class DigitalWalletTokenPaymentInstrument implements JsonSerializable
{
    public const TYPE_APPLE_PAY = 'Apple Pay';

    public const TYPE_GOOGLE_PAY = 'Google Pay';

    public const TYPE_SAMSUNG_PAY = 'Samsung Pay';

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
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('amount', $data)) {
            $this->setAmount($data['amount']);
        }
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
        }
        if (array_key_exists('descriptor', $data)) {
            $this->setDescriptor($data['descriptor']);
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
        if (array_key_exists('expMonth', $data)) {
            $this->setExpMonth($data['expMonth']);
        }
        if (array_key_exists('expYear', $data)) {
            $this->setExpYear($data['expYear']);
        }
        if (array_key_exists('payload', $data)) {
            $this->setPayload($data['payload']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getType(): string
    {
        return $this->fields['type'];
    }

    public function setType(string $type): static
    {
        $this->fields['type'] = $type;

        return $this;
    }

    public function getAmount(): float
    {
        return $this->fields['amount'];
    }

    public function setAmount(float|string $amount): static
    {
        if (is_string($amount)) {
            $amount = (float) $amount;
        }

        $this->fields['amount'] = $amount;

        return $this;
    }

    public function getCurrency(): string
    {
        return $this->fields['currency'];
    }

    public function setCurrency(string $currency): static
    {
        $this->fields['currency'] = $currency;

        return $this;
    }

    public function getDescriptor(): string
    {
        return $this->fields['descriptor'];
    }

    public function setDescriptor(string $descriptor): static
    {
        $this->fields['descriptor'] = $descriptor;

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

    public function getExpMonth(): ?int
    {
        return $this->fields['expMonth'] ?? null;
    }

    public function getExpYear(): ?int
    {
        return $this->fields['expYear'] ?? null;
    }

    public function getPayload(): array
    {
        return $this->fields['payload'];
    }

    public function setPayload(array $payload): static
    {
        $this->fields['payload'] = $payload;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('amount', $this->fields)) {
            $data['amount'] = $this->fields['amount'];
        }
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }
        if (array_key_exists('descriptor', $this->fields)) {
            $data['descriptor'] = $this->fields['descriptor'];
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
        if (array_key_exists('expMonth', $this->fields)) {
            $data['expMonth'] = $this->fields['expMonth'];
        }
        if (array_key_exists('expYear', $this->fields)) {
            $data['expYear'] = $this->fields['expYear'];
        }
        if (array_key_exists('payload', $this->fields)) {
            $data['payload'] = $this->fields['payload'];
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

    private function setExpMonth(null|int $expMonth): static
    {
        $this->fields['expMonth'] = $expMonth;

        return $this;
    }

    private function setExpYear(null|int $expYear): static
    {
        $this->fields['expYear'] = $expYear;

        return $this;
    }
}
