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

class ProofOfPurchaseKycDocumentParsedData implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('data', $data)) {
            $this->setData($data['data']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getData(): ?PurchaseMatches
    {
        return $this->fields['data'] ?? null;
    }

    public function setData(null|PurchaseMatches|array $data): static
    {
        if ($data !== null && !($data instanceof PurchaseMatches)) {
            $data = PurchaseMatches::from($data);
        }

        $this->fields['data'] = $data;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('data', $this->fields)) {
            $data['data'] = $this->fields['data']?->jsonSerialize();
        }

        return $data;
    }
}
