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

class NetbankingCredentials implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('midcode', $data)) {
            $this->setMidcode($data['midcode']);
        }
        if (array_key_exists('midsecret', $data)) {
            $this->setMidsecret($data['midsecret']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getMidcode(): string
    {
        return $this->fields['midcode'];
    }

    public function setMidcode(string $midcode): static
    {
        $this->fields['midcode'] = $midcode;

        return $this;
    }

    public function getMidsecret(): string
    {
        return $this->fields['midsecret'];
    }

    public function setMidsecret(string $midsecret): static
    {
        $this->fields['midsecret'] = $midsecret;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('midcode', $this->fields)) {
            $data['midcode'] = $this->fields['midcode'];
        }
        if (array_key_exists('midsecret', $this->fields)) {
            $data['midsecret'] = $this->fields['midsecret'];
        }

        return $data;
    }
}
