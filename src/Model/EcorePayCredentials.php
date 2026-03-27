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

class EcorePayCredentials implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('accountId', $data)) {
            $this->setAccountId($data['accountId']);
        }
        if (array_key_exists('accountAuth', $data)) {
            $this->setAccountAuth($data['accountAuth']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
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

    public function getAccountAuth(): string
    {
        return $this->fields['accountAuth'];
    }

    public function setAccountAuth(string $accountAuth): static
    {
        $this->fields['accountAuth'] = $accountAuth;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('accountId', $this->fields)) {
            $data['accountId'] = $this->fields['accountId'];
        }
        if (array_key_exists('accountAuth', $this->fields)) {
            $data['accountAuth'] = $this->fields['accountAuth'];
        }

        return $data;
    }
}
