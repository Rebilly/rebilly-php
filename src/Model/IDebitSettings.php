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

class IDebitSettings implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('merchantSubId', $data)) {
            $this->setMerchantSubId($data['merchantSubId']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getMerchantSubId(): ?int
    {
        return $this->fields['merchantSubId'] ?? null;
    }

    public function setMerchantSubId(null|int $merchantSubId): static
    {
        $this->fields['merchantSubId'] = $merchantSubId;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('merchantSubId', $this->fields)) {
            $data['merchantSubId'] = $this->fields['merchantSubId'];
        }

        return $data;
    }
}
