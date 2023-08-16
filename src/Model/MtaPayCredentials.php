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

class MtaPayCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('accountId', $data)) {
            $this->setAccountId($data['accountId']);
        }
        if (array_key_exists('partyId', $data)) {
            $this->setPartyId($data['partyId']);
        }
        if (array_key_exists('md5key', $data)) {
            $this->setMd5key($data['md5key']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getAccountId(): string
    {
        return $this->fields['accountId'];
    }

    public function setAccountId(string $accountId): static
    {
        $this->fields['accountId'] = $accountId;

        return $this;
    }

    public function getPartyId(): string
    {
        return $this->fields['partyId'];
    }

    public function setPartyId(string $partyId): static
    {
        $this->fields['partyId'] = $partyId;

        return $this;
    }

    public function getMd5key(): string
    {
        return $this->fields['md5key'];
    }

    public function setMd5key(string $md5key): static
    {
        $this->fields['md5key'] = $md5key;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('accountId', $this->fields)) {
            $data['accountId'] = $this->fields['accountId'];
        }
        if (array_key_exists('partyId', $this->fields)) {
            $data['partyId'] = $this->fields['partyId'];
        }
        if (array_key_exists('md5key', $this->fields)) {
            $data['md5key'] = $this->fields['md5key'];
        }

        return $data;
    }
}
