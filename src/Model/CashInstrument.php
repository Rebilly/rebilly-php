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

class CashInstrument implements CustomerDefaultPaymentInstrument, TransactionPaymentInstrument
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('receivedBy', $data)) {
            $this->setReceivedBy($data['receivedBy']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
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
