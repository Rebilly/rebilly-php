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

class ChaseCredentials implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('username', $data)) {
            $this->setUsername($data['username']);
        }
        if (array_key_exists('password', $data)) {
            $this->setPassword($data['password']);
        }
        if (array_key_exists('coNumber', $data)) {
            $this->setCoNumber($data['coNumber']);
        }
        if (array_key_exists('divisionId', $data)) {
            $this->setDivisionId($data['divisionId']);
        }
        if (array_key_exists('partialAuth', $data)) {
            $this->setPartialAuth($data['partialAuth']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getUsername(): string
    {
        return $this->fields['username'];
    }

    public function setUsername(string $username): self
    {
        $this->fields['username'] = $username;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->fields['password'];
    }

    public function setPassword(string $password): self
    {
        $this->fields['password'] = $password;

        return $this;
    }

    public function getCoNumber(): string
    {
        return $this->fields['coNumber'];
    }

    public function setCoNumber(string $coNumber): self
    {
        $this->fields['coNumber'] = $coNumber;

        return $this;
    }

    public function getDivisionId(): string
    {
        return $this->fields['divisionId'];
    }

    public function setDivisionId(string $divisionId): self
    {
        $this->fields['divisionId'] = $divisionId;

        return $this;
    }

    public function getPartialAuth(): bool
    {
        return $this->fields['partialAuth'];
    }

    public function setPartialAuth(bool $partialAuth): self
    {
        $this->fields['partialAuth'] = $partialAuth;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('username', $this->fields)) {
            $data['username'] = $this->fields['username'];
        }
        if (array_key_exists('password', $this->fields)) {
            $data['password'] = $this->fields['password'];
        }
        if (array_key_exists('coNumber', $this->fields)) {
            $data['coNumber'] = $this->fields['coNumber'];
        }
        if (array_key_exists('divisionId', $this->fields)) {
            $data['divisionId'] = $this->fields['divisionId'];
        }
        if (array_key_exists('partialAuth', $this->fields)) {
            $data['partialAuth'] = $this->fields['partialAuth'];
        }

        return $data;
    }
}
