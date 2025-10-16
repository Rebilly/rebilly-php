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

class CryptomusSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('refundAddress', $data)) {
            $this->setRefundAddress($data['refundAddress']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getRefundAddress(): ?string
    {
        return $this->fields['refundAddress'] ?? null;
    }

    public function setRefundAddress(null|string $refundAddress): static
    {
        $this->fields['refundAddress'] = $refundAddress;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('refundAddress', $this->fields)) {
            $data['refundAddress'] = $this->fields['refundAddress'];
        }

        return $data;
    }
}
