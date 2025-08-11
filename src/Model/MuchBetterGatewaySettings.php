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

class MuchBetterGatewaySettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('hasPhoneNumberRequest', $data)) {
            $this->setHasPhoneNumberRequest($data['hasPhoneNumberRequest']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
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
        if (array_key_exists('hasPhoneNumberRequest', $this->fields)) {
            $data['hasPhoneNumberRequest'] = $this->fields['hasPhoneNumberRequest'];
        }

        return $data;
    }
}
