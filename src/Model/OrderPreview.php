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

class OrderPreview extends CommonOrderPreview
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        parent::__construct($data);

        if (array_key_exists('shipping', $data)) {
            $this->setShipping($data['shipping']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getShipping(): ?Shipping
    {
        return $this->fields['shipping'] ?? null;
    }

    public function setShipping(null|Shipping|array $shipping): self
    {
        if ($shipping !== null && !($shipping instanceof \Rebilly\Sdk\Model\Shipping)) {
            $shipping = \Rebilly\Sdk\Model\Shipping::from($shipping);
        }

        $this->fields['shipping'] = $shipping;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('shipping', $this->fields)) {
            $data['shipping'] = $this->fields['shipping']?->jsonSerialize();
        }

        return parent::jsonSerialize() + $data;
    }
}
