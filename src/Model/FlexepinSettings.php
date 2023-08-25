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

class FlexepinSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('adjustAmountFromVoucher', $data)) {
            $this->setAdjustAmountFromVoucher($data['adjustAmountFromVoucher']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getAdjustAmountFromVoucher(): ?bool
    {
        return $this->fields['adjustAmountFromVoucher'] ?? null;
    }

    public function setAdjustAmountFromVoucher(null|bool $adjustAmountFromVoucher): static
    {
        $this->fields['adjustAmountFromVoucher'] = $adjustAmountFromVoucher;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('adjustAmountFromVoucher', $this->fields)) {
            $data['adjustAmountFromVoucher'] = $this->fields['adjustAmountFromVoucher'];
        }

        return $data;
    }
}
