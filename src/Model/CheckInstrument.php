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

class CheckInstrument implements CustomerDefaultPaymentInstrument, TransactionPaymentInstrument
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('reference', $data)) {
            $this->setReference($data['reference']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getMethod(): string
    {
        return 'check';
    }

    public function getReference(): ?string
    {
        return $this->fields['reference'] ?? null;
    }

    public function setReference(null|string $reference): static
    {
        $this->fields['reference'] = $reference;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'method' => 'check',
        ];
        if (array_key_exists('reference', $this->fields)) {
            $data['reference'] = $this->fields['reference'];
        }

        return $data;
    }
}
