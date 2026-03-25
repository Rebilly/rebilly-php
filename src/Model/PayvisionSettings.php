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

class PayvisionSettings implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('avs', $data)) {
            $this->setAvs($data['avs']);
        }
        if (array_key_exists('delay', $data)) {
            $this->setDelay($data['delay']);
        }
        if (array_key_exists('merchantAccountType', $data)) {
            $this->setMerchantAccountType($data['merchantAccountType']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getAvs(): ?bool
    {
        return $this->fields['avs'] ?? null;
    }

    public function setAvs(null|bool $avs): static
    {
        $this->fields['avs'] = $avs;

        return $this;
    }

    public function getDelay(): ?int
    {
        return $this->fields['delay'] ?? null;
    }

    public function setDelay(null|int $delay): static
    {
        $this->fields['delay'] = $delay;

        return $this;
    }

    public function getMerchantAccountType(): int
    {
        return $this->fields['merchantAccountType'];
    }

    public function setMerchantAccountType(int $merchantAccountType): static
    {
        $this->fields['merchantAccountType'] = $merchantAccountType;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('avs', $this->fields)) {
            $data['avs'] = $this->fields['avs'];
        }
        if (array_key_exists('delay', $this->fields)) {
            $data['delay'] = $this->fields['delay'];
        }
        if (array_key_exists('merchantAccountType', $this->fields)) {
            $data['merchantAccountType'] = $this->fields['merchantAccountType'];
        }

        return $data;
    }
}
