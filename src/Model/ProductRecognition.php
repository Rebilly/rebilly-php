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

class ProductRecognition implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('debitAccountId', $data)) {
            $this->setDebitAccountId($data['debitAccountId']);
        }
        if (array_key_exists('creditAccountId', $data)) {
            $this->setCreditAccountId($data['creditAccountId']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getDebitAccountId(): ?string
    {
        return $this->fields['debitAccountId'] ?? null;
    }

    public function setDebitAccountId(null|string $debitAccountId): static
    {
        $this->fields['debitAccountId'] = $debitAccountId;

        return $this;
    }

    public function getCreditAccountId(): ?string
    {
        return $this->fields['creditAccountId'] ?? null;
    }

    public function setCreditAccountId(null|string $creditAccountId): static
    {
        $this->fields['creditAccountId'] = $creditAccountId;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('debitAccountId', $this->fields)) {
            $data['debitAccountId'] = $this->fields['debitAccountId'];
        }
        if (array_key_exists('creditAccountId', $this->fields)) {
            $data['creditAccountId'] = $this->fields['creditAccountId'];
        }

        return $data;
    }
}
