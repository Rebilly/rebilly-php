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

class WebhookEvent implements JsonSerializable
{
    use HasMetadata;

    public const PRODUCT_CORE = 'core';

    public const PRODUCT_REPLAY = 'replay';

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('eventType', $data)) {
            $this->setEventType($data['eventType']);
        }
        if (array_key_exists('product', $data)) {
            $this->setProduct($data['product']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getEventType(): string
    {
        return $this->fields['eventType'];
    }

    public function getProduct(): string
    {
        return $this->fields['product'];
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('eventType', $this->fields)) {
            $data['eventType'] = $this->fields['eventType'];
        }
        if (array_key_exists('product', $this->fields)) {
            $data['product'] = $this->fields['product'];
        }

        return $data;
    }

    private function setEventType(string $eventType): static
    {
        $this->fields['eventType'] = $eventType;

        return $this;
    }

    private function setProduct(string $product): static
    {
        $this->fields['product'] = $product;

        return $this;
    }
}
