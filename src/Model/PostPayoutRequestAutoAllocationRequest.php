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

class PostPayoutRequestAutoAllocationRequest implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('payoutRequestId', $data)) {
            $this->setPayoutRequestId($data['payoutRequestId']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getPayoutRequestId(): string
    {
        return $this->fields['payoutRequestId'];
    }

    public function setPayoutRequestId(string $payoutRequestId): static
    {
        $this->fields['payoutRequestId'] = $payoutRequestId;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('payoutRequestId', $this->fields)) {
            $data['payoutRequestId'] = $this->fields['payoutRequestId'];
        }

        return $data;
    }
}
