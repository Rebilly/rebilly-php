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

class GlobalOneCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('terminalId', $data)) {
            $this->setTerminalId($data['terminalId']);
        }
        if (array_key_exists('sharedSecret', $data)) {
            $this->setSharedSecret($data['sharedSecret']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getTerminalId(): string
    {
        return $this->fields['terminalId'];
    }

    public function setTerminalId(string $terminalId): static
    {
        $this->fields['terminalId'] = $terminalId;

        return $this;
    }

    public function getSharedSecret(): string
    {
        return $this->fields['sharedSecret'];
    }

    public function setSharedSecret(string $sharedSecret): static
    {
        $this->fields['sharedSecret'] = $sharedSecret;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('terminalId', $this->fields)) {
            $data['terminalId'] = $this->fields['terminalId'];
        }
        if (array_key_exists('sharedSecret', $this->fields)) {
            $data['sharedSecret'] = $this->fields['sharedSecret'];
        }

        return $data;
    }
}
