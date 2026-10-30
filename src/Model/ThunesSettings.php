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

class ThunesSettings implements JsonSerializable
{
    use HasMetadata;

    public const TRANSACTION_TYPE_C2_B = 'C2B';

    public const TRANSACTION_TYPE_B2_B = 'B2B';

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('transactionType', $data)) {
            $this->setTransactionType($data['transactionType']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getTransactionType(): string
    {
        return $this->fields['transactionType'];
    }

    public function setTransactionType(string $transactionType): static
    {
        $this->fields['transactionType'] = $transactionType;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('transactionType', $this->fields)) {
            $data['transactionType'] = $this->fields['transactionType'];
        }

        return $data;
    }
}
