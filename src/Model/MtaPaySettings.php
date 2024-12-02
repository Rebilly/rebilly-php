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

class MtaPaySettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('goods', $data)) {
            $this->setGoods($data['goods']);
        }
        if (array_key_exists('mobilePay', $data)) {
            $this->setMobilePay($data['mobilePay']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getGoods(): string
    {
        return $this->fields['goods'];
    }

    public function setGoods(string $goods): static
    {
        $this->fields['goods'] = $goods;

        return $this;
    }

    public function getMobilePay(): string
    {
        return $this->fields['mobilePay'];
    }

    public function setMobilePay(string $mobilePay): static
    {
        $this->fields['mobilePay'] = $mobilePay;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('goods', $this->fields)) {
            $data['goods'] = $this->fields['goods'];
        }
        if (array_key_exists('mobilePay', $this->fields)) {
            $data['mobilePay'] = $this->fields['mobilePay'];
        }

        return $data;
    }
}
