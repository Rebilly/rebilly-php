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

use Rebilly\Sdk\Trait\HasMetadata;

class CashInstrument implements CustomerDefaultPaymentInstrument, TransactionPaymentInstrument
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('receivedBy', $data)) {
            $this->setReceivedBy($data['receivedBy']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getMethod(): string
    {
        return 'cash';
    }

    public function getReceivedBy(): ?string
    {
        return $this->fields['receivedBy'] ?? null;
    }

    public function setReceivedBy(null|string $receivedBy): static
    {
        $this->fields['receivedBy'] = $receivedBy;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'method' => 'cash',
        ];
        if (array_key_exists('receivedBy', $this->fields)) {
            $data['receivedBy'] = $this->fields['receivedBy'];
        }

        return $data;
    }
}
