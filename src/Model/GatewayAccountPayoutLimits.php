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

class GatewayAccountPayoutLimits implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('maxPerTransaction', $data)) {
            $this->setMaxPerTransaction($data['maxPerTransaction']);
        }
        if (array_key_exists('minPerTransaction', $data)) {
            $this->setMinPerTransaction($data['minPerTransaction']);
        }
        if (array_key_exists('maxPerPeriod', $data)) {
            $this->setMaxPerPeriod($data['maxPerPeriod']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    /**
     * @return null|GatewayAccountPayoutLimitsMaxPerTransaction[]
     */
    public function getMaxPerTransaction(): ?array
    {
        return $this->fields['maxPerTransaction'] ?? null;
    }

    /**
     * @param null|array[]|GatewayAccountPayoutLimitsMaxPerTransaction[] $maxPerTransaction
     */
    public function setMaxPerTransaction(null|array $maxPerTransaction): static
    {
        $maxPerTransaction = $maxPerTransaction !== null ? array_map(
            fn ($value) => $value instanceof GatewayAccountPayoutLimitsMaxPerTransaction ? $value : GatewayAccountPayoutLimitsMaxPerTransaction::from($value),
            $maxPerTransaction,
        ) : null;

        $this->fields['maxPerTransaction'] = $maxPerTransaction;

        return $this;
    }

    /**
     * @return null|GatewayAccountPayoutLimitsMinPerTransaction[]
     */
    public function getMinPerTransaction(): ?array
    {
        return $this->fields['minPerTransaction'] ?? null;
    }

    /**
     * @param null|array[]|GatewayAccountPayoutLimitsMinPerTransaction[] $minPerTransaction
     */
    public function setMinPerTransaction(null|array $minPerTransaction): static
    {
        $minPerTransaction = $minPerTransaction !== null ? array_map(
            fn ($value) => $value instanceof GatewayAccountPayoutLimitsMinPerTransaction ? $value : GatewayAccountPayoutLimitsMinPerTransaction::from($value),
            $minPerTransaction,
        ) : null;

        $this->fields['minPerTransaction'] = $minPerTransaction;

        return $this;
    }

    /**
     * @return null|GatewayAccountPayoutLimitsMaxPerPeriod[]
     */
    public function getMaxPerPeriod(): ?array
    {
        return $this->fields['maxPerPeriod'] ?? null;
    }

    /**
     * @param null|array[]|GatewayAccountPayoutLimitsMaxPerPeriod[] $maxPerPeriod
     */
    public function setMaxPerPeriod(null|array $maxPerPeriod): static
    {
        $maxPerPeriod = $maxPerPeriod !== null ? array_map(
            fn ($value) => $value instanceof GatewayAccountPayoutLimitsMaxPerPeriod ? $value : GatewayAccountPayoutLimitsMaxPerPeriod::from($value),
            $maxPerPeriod,
        ) : null;

        $this->fields['maxPerPeriod'] = $maxPerPeriod;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('maxPerTransaction', $this->fields)) {
            $data['maxPerTransaction'] = $this->fields['maxPerTransaction'] !== null
                ? array_map(
                    static fn (GatewayAccountPayoutLimitsMaxPerTransaction $gatewayAccountPayoutLimitsMaxPerTransaction) => $gatewayAccountPayoutLimitsMaxPerTransaction->jsonSerialize(),
                    $this->fields['maxPerTransaction'],
                )
                : null;
        }
        if (array_key_exists('minPerTransaction', $this->fields)) {
            $data['minPerTransaction'] = $this->fields['minPerTransaction'] !== null
                ? array_map(
                    static fn (GatewayAccountPayoutLimitsMinPerTransaction $gatewayAccountPayoutLimitsMinPerTransaction) => $gatewayAccountPayoutLimitsMinPerTransaction->jsonSerialize(),
                    $this->fields['minPerTransaction'],
                )
                : null;
        }
        if (array_key_exists('maxPerPeriod', $this->fields)) {
            $data['maxPerPeriod'] = $this->fields['maxPerPeriod'] !== null
                ? array_map(
                    static fn (GatewayAccountPayoutLimitsMaxPerPeriod $gatewayAccountPayoutLimitsMaxPerPeriod) => $gatewayAccountPayoutLimitsMaxPerPeriod->jsonSerialize(),
                    $this->fields['maxPerPeriod'],
                )
                : null;
        }

        return $data;
    }
}
