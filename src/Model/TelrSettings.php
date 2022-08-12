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

class TelrSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('transactionDescription', $data)) {
            $this->setTransactionDescription($data['transactionDescription']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getTransactionDescription(): ?string
    {
        return $this->fields['transactionDescription'] ?? null;
    }

    public function setTransactionDescription(null|string $transactionDescription): self
    {
        $this->fields['transactionDescription'] = $transactionDescription;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('transactionDescription', $this->fields)) {
            $data['transactionDescription'] = $this->fields['transactionDescription'];
        }

        return $data;
    }
}
