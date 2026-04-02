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
use Rebilly\Sdk\Trait\HasMetadata;

class SubscriptionOrOneTimeSaleItemEmbedded implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('product', $data)) {
            $this->setProduct($data['product']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getProduct(): ?Product
    {
        return $this->fields['product'] ?? null;
    }

    public function setProduct(null|Product|array $product): static
    {
        if ($product !== null && !($product instanceof Product)) {
            $product = Product::from($product);
        }

        $this->fields['product'] = $product;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('product', $this->fields)) {
            $data['product'] = $this->fields['product']?->jsonSerialize();
        }

        return $data;
    }
}
