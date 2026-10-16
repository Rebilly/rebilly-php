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

class CpsSettings implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('paymentUrl', $data)) {
            $this->setPaymentUrl($data['paymentUrl']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getPaymentUrl(): string
    {
        return $this->fields['paymentUrl'];
    }

    public function setPaymentUrl(string $paymentUrl): static
    {
        $this->fields['paymentUrl'] = $paymentUrl;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('paymentUrl', $this->fields)) {
            $data['paymentUrl'] = $this->fields['paymentUrl'];
        }

        return $data;
    }
}
