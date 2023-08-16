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

class OrganizationSettingsDefaultTaxCalculator implements JsonSerializable
{
    public const TYPE_TAXJAR = 'taxjar';

    public const TYPE_FLAT = 'flat';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('rate', $data)) {
            $this->setRate($data['rate']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @psalm-return self::TYPE_* $type
     */
    public function getType(): string
    {
        return $this->fields['type'];
    }

    /**
     * @psalm-param self::TYPE_* $type
     */
    public function setType(string $type): static
    {
        $this->fields['type'] = $type;

        return $this;
    }

    public function getRate(): ?float
    {
        return $this->fields['rate'] ?? null;
    }

    public function setRate(null|float|string $rate): static
    {
        if (is_string($rate)) {
            $rate = (float) $rate;
        }

        $this->fields['rate'] = $rate;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('rate', $this->fields)) {
            $data['rate'] = $this->fields['rate'];
        }

        return $data;
    }
}
