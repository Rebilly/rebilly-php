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

class CustomerCreditBalance implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('balances', $data)) {
            $this->setBalances($data['balances']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    /**
     * @return CustomerCreditBalanceBalances[]
     */
    public function getBalances(): array
    {
        return $this->fields['balances'];
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('balances', $this->fields)) {
            $data['balances'] = array_map(
                static fn (CustomerCreditBalanceBalances $customerCreditBalanceBalances) => $customerCreditBalanceBalances->jsonSerialize(),
                $this->fields['balances'],
            );
        }

        return $data;
    }

    /**
     * @param array[]|CustomerCreditBalanceBalances[] $balances
     */
    private function setBalances(array $balances): static
    {
        $balances = array_map(
            fn ($value) => $value instanceof CustomerCreditBalanceBalances ? $value : CustomerCreditBalanceBalances::from($value),
            $balances,
        );

        $this->fields['balances'] = $balances;

        return $this;
    }
}
