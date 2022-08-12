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

class PaymeroSettings implements JsonSerializable
{
    public const MAIN_CURRENCY_TRX = 'TRX';

    public const MAIN_CURRENCY_ETH = 'ETH';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('targetCurrency', $data)) {
            $this->setTargetCurrency($data['targetCurrency']);
        }
        if (array_key_exists('mainCurrency', $data)) {
            $this->setMainCurrency($data['mainCurrency']);
        }
        if (array_key_exists('amountExceeded', $data)) {
            $this->setAmountExceeded($data['amountExceeded']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getTargetCurrency(): ?string
    {
        return $this->fields['targetCurrency'] ?? null;
    }

    public function setTargetCurrency(null|string $targetCurrency): self
    {
        $this->fields['targetCurrency'] = $targetCurrency;

        return $this;
    }

    /**
     * @psalm-return self::MAIN_CURRENCY_*|null $mainCurrency
     */
    public function getMainCurrency(): ?string
    {
        return $this->fields['mainCurrency'] ?? null;
    }

    /**
     * @psalm-param self::MAIN_CURRENCY_*|null $mainCurrency
     */
    public function setMainCurrency(null|string $mainCurrency): self
    {
        $this->fields['mainCurrency'] = $mainCurrency;

        return $this;
    }

    public function getAmountExceeded(): ?bool
    {
        return $this->fields['amountExceeded'] ?? null;
    }

    public function setAmountExceeded(null|bool $amountExceeded): self
    {
        $this->fields['amountExceeded'] = $amountExceeded;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('targetCurrency', $this->fields)) {
            $data['targetCurrency'] = $this->fields['targetCurrency'];
        }
        if (array_key_exists('mainCurrency', $this->fields)) {
            $data['mainCurrency'] = $this->fields['mainCurrency'];
        }
        if (array_key_exists('amountExceeded', $this->fields)) {
            $data['amountExceeded'] = $this->fields['amountExceeded'];
        }

        return $data;
    }
}
