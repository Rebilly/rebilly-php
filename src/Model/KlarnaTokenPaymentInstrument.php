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

class KlarnaTokenPaymentInstrument implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('klarnaAuthorizationToken', $data)) {
            $this->setKlarnaAuthorizationToken($data['klarnaAuthorizationToken']);
        }
        if (array_key_exists('klarnaSessionId', $data)) {
            $this->setKlarnaSessionId($data['klarnaSessionId']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getKlarnaAuthorizationToken(): string
    {
        return $this->fields['klarnaAuthorizationToken'];
    }

    public function setKlarnaAuthorizationToken(string $klarnaAuthorizationToken): static
    {
        $this->fields['klarnaAuthorizationToken'] = $klarnaAuthorizationToken;

        return $this;
    }

    public function getKlarnaSessionId(): string
    {
        return $this->fields['klarnaSessionId'];
    }

    public function setKlarnaSessionId(string $klarnaSessionId): static
    {
        $this->fields['klarnaSessionId'] = $klarnaSessionId;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('klarnaAuthorizationToken', $this->fields)) {
            $data['klarnaAuthorizationToken'] = $this->fields['klarnaAuthorizationToken'];
        }
        if (array_key_exists('klarnaSessionId', $this->fields)) {
            $data['klarnaSessionId'] = $this->fields['klarnaSessionId'];
        }

        return $data;
    }
}
