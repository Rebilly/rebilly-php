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

class KlarnaFeature implements JsonSerializable
{
    public const NAME_KLARNA = 'Klarna';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
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

    /**
     * @psalm-return self::NAME_* $name
     */
    public function getName(): string
    {
        return $this->fields['name'];
    }

    /**
     * @psalm-param self::NAME_* $name
     */
    public function setName(string $name): static
    {
        $this->fields['name'] = $name;

        return $this;
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
        $data = [];
        if (array_key_exists('name', $this->fields)) {
            $data['name'] = $this->fields['name'];
        }
        if (array_key_exists('clientToken', $this->fields)) {
            $data['clientToken'] = $this->fields['clientToken'];
        }
        if (array_key_exists('sessionId', $this->fields)) {
            $data['sessionId'] = $this->fields['sessionId'];
        }

        return $data;
    }
}
