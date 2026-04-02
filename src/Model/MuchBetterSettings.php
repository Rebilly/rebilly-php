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

class MuchBetterSettings implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('brandName', $data)) {
            $this->setBrandName($data['brandName']);
        }
        if (array_key_exists('hasPhoneNumberRequest', $data)) {
            $this->setHasPhoneNumberRequest($data['hasPhoneNumberRequest']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getBrandName(): ?string
    {
        return $this->fields['brandName'] ?? null;
    }

    public function setBrandName(null|string $brandName): static
    {
        $this->fields['brandName'] = $brandName;

        return $this;
    }

    public function getHasPhoneNumberRequest(): ?bool
    {
        return $this->fields['hasPhoneNumberRequest'] ?? null;
    }

    public function setHasPhoneNumberRequest(null|bool $hasPhoneNumberRequest): static
    {
        $this->fields['hasPhoneNumberRequest'] = $hasPhoneNumberRequest;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('brandName', $this->fields)) {
            $data['brandName'] = $this->fields['brandName'];
        }
        if (array_key_exists('hasPhoneNumberRequest', $this->fields)) {
            $data['hasPhoneNumberRequest'] = $this->fields['hasPhoneNumberRequest'];
        }

        return $data;
    }
}
