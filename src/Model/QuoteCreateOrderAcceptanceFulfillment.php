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

class QuoteCreateOrderAcceptanceFulfillment implements JsonSerializable
{
    public const CONDITION_CUSTOMER = 'customer';

    public const CONDITION_PAYMENT = 'payment';

    public const CONDITION_ORGANIZATION = 'organization';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('condition', $data)) {
            $this->setCondition($data['condition']);
        }
        if (array_key_exists('isFulfilled', $data)) {
            $this->setIsFulfilled($data['isFulfilled']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCondition(): ?string
    {
        return $this->fields['condition'] ?? null;
    }

    public function setCondition(null|string $condition): static
    {
        $this->fields['condition'] = $condition;

        return $this;
    }

    public function getIsFulfilled(): ?bool
    {
        return $this->fields['isFulfilled'] ?? null;
    }

    public function setIsFulfilled(null|bool $isFulfilled): static
    {
        $this->fields['isFulfilled'] = $isFulfilled;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('condition', $this->fields)) {
            $data['condition'] = $this->fields['condition'];
        }
        if (array_key_exists('isFulfilled', $this->fields)) {
            $data['isFulfilled'] = $this->fields['isFulfilled'];
        }

        return $data;
    }
}
