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

class ShippingRateEmbed implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('shippingRate', $data)) {
            $this->setShippingRate($data['shippingRate']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getShippingRate(): ?ShippingRate
    {
        return $this->fields['shippingRate'] ?? null;
    }

    public function setShippingRate(null|ShippingRate|array $shippingRate): self
    {
        if ($shippingRate !== null && !($shippingRate instanceof \Rebilly\Sdk\Model\ShippingRate)) {
            $shippingRate = \Rebilly\Sdk\Model\ShippingRate::from($shippingRate);
        }

        $this->fields['shippingRate'] = $shippingRate;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('shippingRate', $this->fields)) {
            $data['shippingRate'] = $this->fields['shippingRate']?->jsonSerialize();
        }

        return $data;
    }
}
