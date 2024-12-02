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

class TWINTSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('cashRegisterType', $data)) {
            $this->setCashRegisterType($data['cashRegisterType']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCashRegisterType(): string
    {
        return $this->fields['cashRegisterType'];
    }

    public function setCashRegisterType(string $cashRegisterType): static
    {
        $this->fields['cashRegisterType'] = $cashRegisterType;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('cashRegisterType', $this->fields)) {
            $data['cashRegisterType'] = $this->fields['cashRegisterType'];
        }

        return $data;
    }
}
