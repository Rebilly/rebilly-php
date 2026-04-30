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

class TxnSettings implements JsonSerializable
{
    use HasMetadata;

    public const PAYOUT_NETWORK_BTC = 'btc';

    public const PAYOUT_NETWORK_USDT = 'usdt';

    public const PAYOUT_NETWORK_ETH = 'eth';

    public const PAYOUT_NETWORK_XRP = 'xrp';

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('payoutNetwork', $data)) {
            $this->setPayoutNetwork($data['payoutNetwork']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getPayoutNetwork(): ?string
    {
        return $this->fields['payoutNetwork'] ?? null;
    }

    public function setPayoutNetwork(null|string $payoutNetwork): static
    {
        $this->fields['payoutNetwork'] = $payoutNetwork;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('payoutNetwork', $this->fields)) {
            $data['payoutNetwork'] = $this->fields['payoutNetwork'];
        }

        return $data;
    }
}
