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

class KlarnaFeature implements ReadyToPayKlarnaMethodFeature
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('clientToken', $data)) {
            $this->setClientToken($data['clientToken']);
        }
        if (array_key_exists('sessionId', $data)) {
            $this->setSessionId($data['sessionId']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getName(): string
    {
        return 'Klarna';
    }

    public function getClientToken(): string
    {
        return $this->fields['clientToken'];
    }

    public function setClientToken(string $clientToken): static
    {
        $this->fields['clientToken'] = $clientToken;

        return $this;
    }

    public function getSessionId(): string
    {
        return $this->fields['sessionId'];
    }

    public function setSessionId(string $sessionId): static
    {
        $this->fields['sessionId'] = $sessionId;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'name' => 'Klarna',
        ];
        if (array_key_exists('clientToken', $this->fields)) {
            $data['clientToken'] = $this->fields['clientToken'];
        }
        if (array_key_exists('sessionId', $this->fields)) {
            $data['sessionId'] = $this->fields['sessionId'];
        }

        return $data;
    }
}
