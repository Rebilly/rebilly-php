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

class InvoiceItemEmbedded implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('product', $data)) {
            $this->setProduct($data['product']);
        }
        if (array_key_exists('plan', $data)) {
            $this->setPlan($data['plan']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getProduct(): ?object
    {
        return $this->fields['product'] ?? null;
    }

    public function setProduct(null|object $product): static
    {
        $this->fields['product'] = $product;

        return $this;
    }

    public function getPlan(): ?object
    {
        return $this->fields['plan'] ?? null;
    }

    public function setPlan(null|object $plan): static
    {
        $this->fields['plan'] = $plan;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('product', $this->fields)) {
            $data['product'] = $this->fields['product'];
        }
        if (array_key_exists('plan', $this->fields)) {
            $data['plan'] = $this->fields['plan'];
        }

        return $data;
    }
}
