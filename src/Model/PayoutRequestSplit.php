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

class PayoutRequestSplit implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('amounts', $data)) {
            $this->setAmounts($data['amounts']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return float[]
     */
    public function getAmounts(): array
    {
        return $this->fields['amounts'];
    }

    /**
     * @param float[]|string[] $amounts
     */
    public function setAmounts(array $amounts): static
    {
        $amounts = array_map(
            fn ($value) => is_string($value) ? (float) $value : $value,
            $amounts,
        );

        $this->fields['amounts'] = $amounts;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('amounts', $this->fields)) {
            $data['amounts'] = $this->fields['amounts'];
        }

        return $data;
    }
}
