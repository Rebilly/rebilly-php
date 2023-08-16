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

class PagaditoCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('uid', $data)) {
            $this->setUid($data['uid']);
        }
        if (array_key_exists('wsk', $data)) {
            $this->setWsk($data['wsk']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getUid(): string
    {
        return $this->fields['uid'];
    }

    public function setUid(string $uid): static
    {
        $this->fields['uid'] = $uid;

        return $this;
    }

    public function getWsk(): string
    {
        return $this->fields['wsk'];
    }

    public function setWsk(string $wsk): static
    {
        $this->fields['wsk'] = $wsk;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('uid', $this->fields)) {
            $data['uid'] = $this->fields['uid'];
        }
        if (array_key_exists('wsk', $this->fields)) {
            $data['wsk'] = $this->fields['wsk'];
        }

        return $data;
    }
}
