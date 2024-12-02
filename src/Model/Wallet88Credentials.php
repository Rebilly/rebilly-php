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

class Wallet88Credentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('sid', $data)) {
            $this->setSid($data['sid']);
        }
        if (array_key_exists('rcode', $data)) {
            $this->setRcode($data['rcode']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getSid(): string
    {
        return $this->fields['sid'];
    }

    public function setSid(string $sid): static
    {
        $this->fields['sid'] = $sid;

        return $this;
    }

    public function getRcode(): string
    {
        return $this->fields['rcode'];
    }

    public function setRcode(string $rcode): static
    {
        $this->fields['rcode'] = $rcode;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('sid', $this->fields)) {
            $data['sid'] = $this->fields['sid'];
        }
        if (array_key_exists('rcode', $this->fields)) {
            $data['rcode'] = $this->fields['rcode'];
        }

        return $data;
    }
}
