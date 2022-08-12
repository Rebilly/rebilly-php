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

class CoinGateCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('authToken', $data)) {
            $this->setAuthToken($data['authToken']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getAuthToken(): string
    {
        return $this->fields['authToken'];
    }

    public function setAuthToken(string $authToken): self
    {
        $this->fields['authToken'] = $authToken;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('authToken', $this->fields)) {
            $data['authToken'] = $this->fields['authToken'];
        }

        return $data;
    }
}
