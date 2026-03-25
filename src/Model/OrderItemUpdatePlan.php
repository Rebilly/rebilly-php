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

class OrderItemUpdatePlan implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('productOptions', $data)) {
            $this->setProductOptions($data['productOptions']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    /**
     * @return null|array<string,string>
     */
    public function getProductOptions(): ?array
    {
        return $this->fields['productOptions'] ?? null;
    }

    /**
     * @param null|array<string,string> $productOptions
     */
    public function setProductOptions(null|array $productOptions): static
    {
        $this->fields['productOptions'] = $productOptions;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('productOptions', $this->fields)) {
            $data['productOptions'] = $this->fields['productOptions'];
        }

        return $data;
    }
}
